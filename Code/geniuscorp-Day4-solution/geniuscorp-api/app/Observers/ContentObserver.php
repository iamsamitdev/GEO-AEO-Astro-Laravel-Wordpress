<?php

namespace App\Observers;

use App\Jobs\TriggerRebuild;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContentObserver
{
    public function saved(Model $model): void
    {
        $this->schedule($model);
    }

    public function deleted(Model $model): void
    {
        $this->schedule($model);
    }

    /**
     * Debounce: ถ้ามี rebuild ค้างอยู่ใน 2 นาทีนี้แล้ว ไม่ต้อง dispatch ซ้ำ
     */
    private function schedule(Model $model): void
    {
        if (! config('geo.rebuild_enabled')) {
            return;
        }

        $reason = class_basename($model) . '#' . $model->getKey();

        if (Cache::add('geo:rebuild-pending', $reason, now()->addMinutes(2))) {
            TriggerRebuild::dispatch($reason)->delay(now()->addMinutes(2));
        }
    }
}
