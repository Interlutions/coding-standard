<?php

/**
 * (c) 2018 Interlutions
 */

namespace App;

/**
 * Class BadConfigurationBag
 *
 * @package App
 * @author Timon F.
 */
class BadConfigurationBag {

    /**
     * @const mixed[]|array default values
     */
    const DEFAULT_CONFIGURATION = array(
        "database_connection" => NULL
    );

    /**
     * @var array
     */
    var $configuration = [];

    /**
     * Constructor
     *
     * @param $configuration
     * @throws \Exception
     */
    function BadConfigurationBag($configuration = array()) {
        if (!is_array($configuration) || empty($configuration)) throw new \Exception("Config missing");

        $this->configuration = array_merge($configuration, self::DEFAULT_CONFIGURATION);
    }

    /**
     * get
     *
     * @param string $configurationKey
     * @return mixed
     */
    public function get($configurationKey) {
        if (!isset($this->configuration[$configurationKey])) {
            var_dump($this->configuration);
            trigger_error("\"$configurationKey\" not set", E_NOTICE);
            return false;
        }

        return($this->configuration[$configurationKey]);
    }

    /**
     * set
     *
     * @param $configurationKey
     * @param $value
     * @return void
     */
    public function set($configurationKey, $value) {
        $this->configuration[$configurationKey] = $value;
    }
}
