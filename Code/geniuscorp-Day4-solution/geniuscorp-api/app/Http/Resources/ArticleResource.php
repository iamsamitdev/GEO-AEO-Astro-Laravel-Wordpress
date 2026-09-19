<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug'         => $this->slug,
            'title'        => $this->title,
            'excerpt'      => $this->excerpt,
            'body'         => $this->when($request->routeIs('articles.show'), $this->body),
            'cover_image'  => $this->cover_image,
            'author'       => new TeamMemberResource($this->whenLoaded('author')),
            'url'          => '/blog/' . $this->slug . '/',
            'published_at' => $this->published_at?->toIso8601String(),
            // dateModified ที่ "จริง": ใช้ content_updated_at ถ้ามี ไม่งั้น published_at (ไม่ใช้ updated_at ดิบ)
            'updated_at'   => ($this->content_updated_at ?? $this->published_at)?->toIso8601String(),
        ];
    }
}
