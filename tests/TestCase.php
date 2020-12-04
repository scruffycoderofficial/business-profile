<?php

namespace DigitalClosuxe\Business\Profile\Tests;

use DigitalClosuxe\Business\Profile\Testing\TestCase as BaseTestCase;
use DigitalClosuxe\Business\Profile\Testing\Concerns\DatabaseMigrations;

class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    /** [@inheritdoc] */
    public function setUp(): void
    {
        $migrations = [
            __DIR__ . '/../infrastructure/database/migrations'
        ];

        $this->connection('sqlite', ':memory:', $migrations);

        $this->migrate();
    }

    /** [@inheritdoc] */
    public function tearDown(): void
    {
        $this->rollback();
    }

    /** [@inheritdoc] */
    protected function connection(string $driver = 'sqlite', string $connection, array $migrationPaths)
    {
        $this->createConnection(['driver' => $driver, 'database' => $connection], $migrationPaths, true);
    }
}