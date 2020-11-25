<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Contracts\ { MobileNumber, EmailAddress };
use DigitalClosuxe\Business\Profile\Contracts\{ AccountProfile, ContactProfile };
use DigitalClosuxe\Business\Profile\Concerns\{ Profile as ProfileConcern, Contact, Setting };

/**
 * Class Profile
 */
class Profile
{
    public function getContact()
    {
        return new class implements ContactProfile, AccountProfile
        {
            use ProfileConcern, Contact;

            public function contactNumber(): MobileNumber
            {
                return new class implements MobileNumber
                {
                    public function contactNumber(): MobileNumber
                    {
                        return new self();
                    }
                };
            }

            public function contactEmail(): EmailAddress
            {
                return new class implements EmailAddress
                {
                    public function contactEmail(): EmailAddress
                    {
                        return new self();
                    }
                };
            }

            public function hasSettings(): bool
            {
                return false;
            }
        };
    }

    public function getAccount()
    {
        return new class implements AccountProfile
        {
            use ProfileConcern, Setting;
        };
    }

    public function hasSettings(): bool
    {
        return false;
    }
}
