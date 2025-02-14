<?php

namespace Modules\Setting\Events\Handlers;

use Illuminate\Contracts\Cache\Repository;

class ClearThemeOptionsCache
{
    /**
     * @var Repository
     */
    private $cache;

    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    public function handle()
    {
        $this->cache->tags('setting.themeoptions')->flush();
    }
}
