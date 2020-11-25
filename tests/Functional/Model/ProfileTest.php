<?php

use PHPUnit\Framework\TestCase;
use DigitalClosuxe\Business\Profile\Testing\DatabaseMigrations;
use DigitalClosuxe\Business\Extension\Eloquent\Models\Profile;

/**
 * @covers Profile::
 */
class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        $this->createConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
        ], [
            __DIR__ . '/../../fixtures/migrations'
        ], true);

        $this->migrate();
    }

    public function test_it_can_write_and_read()
    {
        $profile = new Profile();

        $profile->account_id = 2;
        $profile->contact_id = 3;

        $profile->save();
        
        self::assertNotEmpty($profile->created_at);
    }

    public function tearDown(): void
    {
        $this->migrate();
    }
}