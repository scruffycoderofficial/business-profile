<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Contracts\{ AccountProfile, ContactProfile };
use DigitalClosuxe\Business\Profile\Concerns\{ Profile as ProfileConcern, Contact, Setting };

/**
 * Class Profile
 */
class Profile
{
    public function getContact()
    {
        return new class implements ContactProfile
        {
            use ProfileConcern, Contact;
        };
    }

    public function getAccount()
    {
        return new class implements AccountProfile
        {
            use ProfileConcern, Setting;
        };
    }
}
