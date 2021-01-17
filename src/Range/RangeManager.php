<?php

namespace Askvortsov\TrustLevels\Range;

use Flarum\Extension\ExtensionManager;

class RangeManager
{
    /**
     * @var ExtensionManager
     */
    protected $extensions;

    public function __construct(ExtensionManager $extensions)
    {
        $this->extensions = $extensions;
    }

    protected $drivers = [];

    public function addDriver(string $name, RangeDriverInterface $driver)
    {
        $this->drivers[$name] = $driver;
    }

    public function getDrivers()
    {
        return $this->drivers;
    }
}
