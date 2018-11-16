<?php

namespace App;

use InvalidArgumentException;

/**
 * This illustrates a good example of a PHP class (at least for the coding standard)
 */
class NiceConfigurationBag
{
    private const DEFAULT_CONFIGURATION = [
        'database_connection' => null,
    ];

    private $configuration = [];

    public function __construct(array $configuration = [])
    {
        $this->configuration = array_merge(self::DEFAULT_CONFIGURATION, $configuration);
    }

    public function get(string $configurationKey)
    {
        if (!array_key_exists($configurationKey, $this->configuration)) {
            throw new InvalidArgumentException(
                sprintf('Configuration key "%s" does not exist.', $configurationKey)
            );
        }

        return $this->configuration[$configurationKey];
    }

    public function set($configurationKey, $value): void
    {
        $this->configuration[$configurationKey] = $value;
    }
}
