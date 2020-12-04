<?php

namespace DigitalClosuxe\Business\Profile\Testing
{
    use PHPUnit\Framework\TestCase as BaseTestCase;

    /**
     * Class TestCase
     */
    abstract class TestCase extends BaseTestCase
    {
        /**
         * Create a Connection with a set of configurations on the fly
         */
        abstract protected function connection(string $driver = 'sqlite', string $connection, array $migrationPaths);
    }
}