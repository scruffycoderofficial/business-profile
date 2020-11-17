<?php

namespace DigitalClosuxe\Business\Profile\Model;

use DigitalClosuxe\Business\Profile\Contracts\AccountProfile;

/**
 * Class Account
 */
class Account implements AccountProfile
{
    /** [@inheritdoc] */
    public function hasSettings(): bool
    {
        return false;
    }

    /** [@inheritdoc] */
    public function isActive(): bool
    {
        return false;
    }

    /** [@inheritdoc] */
    public function daysSinceActive(): string
    {
        return '0 days';
    }
}
