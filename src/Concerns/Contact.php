<?php

namespace DigitalClosuxe\Business\Profile\Concerns;

use DigitalClosuxe\Business\Profile\Contracts\EmailAddress;

trait Contact
{
    public function contactEmail(): EmailAddress
    {
        return new class implements EmailAddress{};
    }
}