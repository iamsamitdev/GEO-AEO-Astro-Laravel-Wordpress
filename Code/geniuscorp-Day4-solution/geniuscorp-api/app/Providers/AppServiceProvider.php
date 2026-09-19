<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TeamMember;
use App\Observers\ContentObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Day 4: ทุก model ที่เป็นเนื้อหาเว็บ → trigger rebuild เมื่อเปลี่ยน
        foreach ([Article::class, Faq::class, Portfolio::class, Service::class, TeamMember::class] as $model) {
            $model::observe(ContentObserver::class);
        }
    }
}
