<?php

namespace DigitalClosuxe\Business\Profile\Concerns;

use DigitalClosuxe\Business\Profile\Contracts\{ 
    EmailAddress, 
    ContactProfile
};

trait BusinessContact
{
    public function contactEmail(): EmailAddress
    {
        return new class implements EmailAddress{};
    }
}