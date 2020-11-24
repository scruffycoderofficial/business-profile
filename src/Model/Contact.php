<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Contracts\ContactProfile;
use DigitalClosuxe\Business\Profile\Concerns\{ Profile, Contact as ContactConcern };

class Contact implements ContactProfile
{
    use Profile, ContactConcern;
}
