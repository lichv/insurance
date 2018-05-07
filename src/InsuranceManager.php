<?php

namespace Insurance;

use Illuminate\Support\Arr;
use Illuminate\Support\Manager;
use Insurance\Provider\SunshineProvider;
use Insurance\Provider\InvalidArgumentException;

class InsuranceManager extends Manager implements Contracts\Factory
{
    /**
     * Get a driver instance.
     *
     * @param  string  $driver
     * @return mixed
     */
    public function with($driver)
    {
        return $this->driver($driver);
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Insurance\Provider\AbstractProvider
     */
    protected function createSunshineDriver()
    {
        $config = $this->app['config']['services.sunshine'];

        return $this->buildProvider(
            SunshineProvider::class, $config
        );
    }

    /**
     * Build an OAuth 2 provider instance.
     *
     * @param  string  $provider
     * @param  array  $config
     * @return \Utils\Provider\AbstractProvider
     */
    public function buildProvider($provider, $config)
    {
        return new $provider(
            $this->app['request'], 
            $config
        );
    }

    /**
     * Get the default driver name.
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('No Socialite driver was specified.');
    }
}
