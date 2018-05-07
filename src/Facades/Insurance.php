<?php

namespace Insurance\Facades;

use Illuminate\Support\Facades\Facade;
use Insurance\Contracts\Factory;

/**
 * @see \Utils\SocialiteManager
 */
class Insurance extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }
}
