<?php

namespace DigitalClosuxe\Business\Profile\Contracts;

/**
 * Class AccountProfile
 */
interface AccountProfile extends Profile
{
    /**
     * AccountProfile knows whether it has settings or not
     */
    public function hasSettings(): bool;
}