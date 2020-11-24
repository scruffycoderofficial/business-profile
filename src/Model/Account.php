<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Concerns\{ Profile, Setting };
use DigitalClosuxe\Business\Profile\Contracts\AccountProfile;

/**
 * Class Account
 */
class Account implements AccountProfile
{
    use Profile, Setting;
}
