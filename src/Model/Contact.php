<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Contracts\ContactProfile;
use DigitalClosuxe\Business\Profile\Contracts\ { EmailAddress, MobileNumber };
use DigitalClosuxe\Business\Profile\Concerns\{ Profile, Contact as ContactConcern };

class Contact implements ContactProfile
{
    use Profile, ContactConcern;

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
}
