<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    /**
     * GET /api/v1/sitemap-entries
     * คืน [{ url, lastmod, changefreq, priority, type, title, summary }]
     * lastmod = วันที่แก้เนื้อหาจริง (content_updated_at ถ้ามี) ไม่ใช่ updated_at ดิบ
     */
    public function index(): JsonResponse
    {
        $entries = collect();

        $services   = Service::published()->orderBy('sort_order')->get();
        $articles   = Article::published()->with('author')->orderByDesc('published_at')->get();
        $portfolios = Portfolio::published()->orderByDesc('completed_at')->get();
        $teamUpdated = TeamMember::max('updated_at');

        $latest = collect([
            $services->max('updated_at'),
            $articles->max('updated_at'),
            $portfolios->max('updated_at'),
            $teamUpdated,
        ])->filter()->max();

        $entries->push($this->entry('/', $latest, 'weekly', 1.0, 'home', config('app.name'), null));
        $entries->push($this->entry('/about/', $teamUpdated, 'monthly', 0.6, 'page', 'เกี่ยวกับเรา', null));
        $entries->push($this->entry('/contact/', $teamUpdated, 'yearly', 0.5, 'page', 'ติดต่อเรา', null));
        $entries->push($this->entry('/team/', $teamUpdated, 'monthly', 0.6, 'page', 'ทีมงาน', null));
        $entries->push($this->entry('/services/', $services->max('updated_at'), 'weekly', 0.9, 'collection', 'บริการ', null));
        $entries->push($this->entry('/portfolio/', $portfolios->max('updated_at'), 'monthly', 0.7, 'collection', 'ผลงาน', null));
        $entries->push($this->entry('/blog/', $articles->max('updated_at'), 'daily', 0.8, 'collection', 'บทความ', null));

        foreach ($services as $s) {
            $entries->push($this->entry('/services/' . $s->slug . '/', $s->updated_at, 'monthly', 0.9, 'service', $s->name, $s->short_description));
        }
        foreach ($portfolios as $p) {
            $entries->push($this->entry('/portfolio/' . $p->slug . '/', $p->updated_at, 'yearly', 0.6, 'portfolio', $p->title, $p->summary));
        }
        foreach ($articles as $a) {
            $entries->push($this->entry('/blog/' . $a->slug . '/', $a->content_updated_at ?? $a->published_at, 'monthly', 0.7, 'article', $a->title, $a->excerpt));
        }

        return response()->json(['data' => $entries->values()]);
    }

    private function entry(string $url, $lastmod, string $changefreq, float $priority, string $type, ?string $title, ?string $summary): array
    {
        return [
            'url'        => $url,
            'lastmod'    => $lastmod ? Carbon::parse($lastmod)->toIso8601String() : null,
            'changefreq' => $changefreq,
            'priority'   => $priority,
            'type'       => $type,
            'title'      => $title,
            'summary'    => $summary,
        ];
    }
}
