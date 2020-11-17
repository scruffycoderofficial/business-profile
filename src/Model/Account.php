<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Concerns\{ BusinessProfile, BusinessSetting };
use DigitalClosuxe\Business\Profile\Contracts\AccountProfile;

/**
 * Class Account
 */
class Account implements AccountProfile
{
    use BusinessProfile, BusinessSetting;
}
