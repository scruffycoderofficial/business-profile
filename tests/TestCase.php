<?php

namespace DigitalClosuxe\Business\Profile\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use DigitalClosuxe\Business\Profile\Testing\DatabaseMigrations;

class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    /** [@inheritdoc] */
    public function setUp(): void
    {
        $this->createConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
        ], [
            __DIR__ . '/../infrastructure/database/migrations' //Todo: Provide a way to override this to avoid breaking migrations
        ], true);

        $this->migrate();
    }

    /** [@inheritdoc] */
    public function tearDown(): void
    {
        $this->rollback();
    }
}