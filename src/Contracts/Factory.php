<?php

namespace Insurance\Contracts;

interface Factory
{
    /**
     * Get an OAuth provider implementation.
     *
     * @param  string  $driver
     * @return \Insurance\Contracts\Provider
     */
    public function driver($driver = null);
}
