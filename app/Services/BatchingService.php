<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BatchingService
{
    public function batchProducts(Collection $products, int $batchSize = 2)
    {
        return $products->chunk($batchSize);
    }

    public function getCachedBatch(string $key, callable $callback, int $ttl = 600)
    {
        return Cache::tags(['batches'])->remember($key, $ttl, $callback);
    }
}
