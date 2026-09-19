<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FaqController extends Controller
{
    // GET /api/v1/faqs            → FAQ ทั้งหมด (เฉพาะบริการที่เผยแพร่)
    // GET /api/v1/faqs?service=x  → FAQ ของบริการเดียว
    public function index(Request $request): AnonymousResourceCollection
    {
        $faqs = Faq::query()
            ->whereHas('service', fn ($q) => $q->published())
            ->when($request->query('service'), function ($query, string $slug) {
                $query->whereHas('service', fn ($q) => $q->where('slug', $slug));
            })
            ->with('service:id,slug,name')
            ->orderBy('service_id')
            ->orderBy('sort_order')
            ->get();

        return FaqResource::collection($faqs);
    }
}
