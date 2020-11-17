<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Contracts\ContactProfile;
use DigitalClosuxe\Business\Profile\Concerns\{ BusinessProfile, BusinessContact };

class Contact implements ContactProfile
{
    use BusinessProfile, BusinessContact;
}
