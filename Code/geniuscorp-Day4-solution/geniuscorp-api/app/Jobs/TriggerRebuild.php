<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TriggerRebuild implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(public string $reason)
    {
    }

    public function handle(): void
    {
        Cache::forget('geo:rebuild-pending');

        $payload = [
            'event'  => 'content-updated',
            'reason' => $this->reason,
            'at'     => now()->toIso8601String(),
        ];

        $response = match (config('geo.rebuild_driver')) {
            'github' => $this->viaGithub($payload),
            default  => $this->viaWebhook($payload),
        };

        if (! $response->successful()) {
            Log::error('Rebuild webhook failed', ['status' => $response->status(), 'body' => $response->body()]);
            $this->release($this->backoff);
            return;
        }

        Log::info('Rebuild triggered', $payload);
    }

    // ตัวเลือก A: GitHub Actions repository_dispatch
    private function viaGithub(array $payload): Response
    {
        return Http::withToken(config('geo.github_token'))
            ->withHeaders(['Accept' => 'application/vnd.github+json'])
            ->post('https://api.github.com/repos/' . config('geo.github_repo') . '/dispatches', [
                'event_type'     => 'content-updated',
                'client_payload' => $payload,
            ]);
    }

    // ตัวเลือก B: webhook receiver ของเราเอง + HMAC
    private function viaWebhook(array $payload): Response
    {
        $body      = json_encode($payload);
        $signature = hash_hmac('sha256', $body, (string) config('geo.webhook_secret'));

        return Http::withBody($body, 'application/json')
            ->withHeaders(['X-Geo-Signature' => $signature])
            ->timeout(10)
            ->post(config('geo.webhook_url'));
    }
}
