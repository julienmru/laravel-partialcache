<?php

namespace JulienMru\PartialCache;

use Illuminate\Support\Facades\Facade;

class PartialCacheFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'partialcache';
    }
}
