<?php

use PHPUnit\Framework\TestCase;
use DigitalClosuxe\Business\Profile\Testing\DatabaseMigrations;
use DigitalClosuxe\Business\Extension\Eloquent\Models\Profile;
use DigitalClosuxe\Business\Profile\Model\Contact;

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
        $cachedUuid = md5(uniqid(MODULE_NAMESPACE));

        $profile = Profile::create([
            'uuid' => $cachedUuid,
            'account_id' => md5(uniqid(Account::class)),
            'contact_id' => md5(uniqid(Contact::class)),
        ]);
        
        self::assertSame($profile->uuid, $cachedUuid);
    }

    public function tearDown(): void
    {
        $this->migrate();
    }
}