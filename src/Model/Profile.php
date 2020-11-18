<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Contracts\{ AccountProfile, ContactProfile };
use DigitalClosuxe\Business\Profile\Concerns\{ BusinessProfile, BusinessContact, BusinessSetting };

/**
 * Class Profile
 */
class Profile
{
    public function getContact()
    {
        return new class implements ContactProfile
        {
            use BusinessProfile, BusinessContact;
        };
    }

    public function getAccount()
    {
        return new class implements AccountProfile
        {
            use BusinessProfile, BusinessSetting;
        };
    }
}
