<?php

namespace DigitalClosuxe\Business\Profile\Tests\Functional\Model\Entity;

use DigitalClosuxe\Business\Profile\Entity\{
    Profile, Contact, Account
};

use DigitalClosuxe\Business\Profile\Tests\TestCase;

/**
 * Class ProfileTest
 * 
 * @covers Profile::
 */
class ProfileTest extends TestCase
{
    const PROFILE_PROPS = [
        'crm_ref' => 'DCG01-2020-0001',
        'account' => [
            'name' => 'Luyanda Test Account', 
            'number' => '0987654321'
        ],
        'contact' => [
            'firstname' => 'Luyanda', 
            'lastname' => 'Siko',
        ]
    ];

    /** @test */
    public function it_can_write_and_read_a_profile_without_associated_entities()
    {
        $profile = Profile::create(['crm_ref' => self::PROFILE_PROPS['crm_ref']]);

        self::assertSame(1, $profile->id);
        self::assertSame(self::PROFILE_PROPS['crm_ref'], $profile->crm_ref);
    }

    /** @test */
    public function it_can_write_and_read_a_profile_with_associated_contact()
    {
        $profile = Profile::create(['crm_ref' => self::PROFILE_PROPS['crm_ref']]);
        $contact = new Contact(['firstname' => 'Luyanda', 'lastname' => 'Siko']);

        $profile->contact()->save($contact);

        self::assertSame(self::PROFILE_PROPS['contact']['firstname'], $profile->contact->firstname);
        self::assertSame(self::PROFILE_PROPS['contact']['lastname'], $profile->contact->lastname);
    }

    /** @test */
    public function it_can_write_and_read_a_profile_with_associated_account()
    {
        $profile = Profile::create(['crm_ref' => self::PROFILE_PROPS['crm_ref']]);
        $account = new Account(['name' => 'Luyanda Test Account', 'number' => '0987654321']);

        $profile->contact()->save($account);

        self::assertSame(self::PROFILE_PROPS['account']['name'], $profile->account->name);
        self::assertSame(self::PROFILE_PROPS['account']['number'], $profile->account->number);
    }
}