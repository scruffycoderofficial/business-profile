<?php

namespace DigitalClosuxe\Business\Profile\Contracts;

/**
 * Class ContactProfile
 */
interface ContactProfile extends Profile
{
    /**
     * Primary way to get in-contact with the Contact of this Profile
     */
    public function contactEmail(): EmailAddress;
}