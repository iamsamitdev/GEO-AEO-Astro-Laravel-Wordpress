<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'question' => $this->question,
            'answer'   => $this->answer,
            'service'  => $this->whenLoaded('service', fn () => [
                'slug' => $this->service->slug,
                'name' => $this->service->name,
                'url'  => '/services/' . $this->service->slug . '/',
            ]),
        ];
    }
}
