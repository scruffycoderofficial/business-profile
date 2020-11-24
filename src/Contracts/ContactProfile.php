<?php

namespace DigitalClosuxe\Business\Profile\Contracts;

/**
 * Class ContactProfile
 */
interface ContactProfile extends Profile
{
    /**
     * Primary Contact Email Address
     */
    public function contactEmail(): EmailAddress;

    /**
     * Primary Contact Mobile Number
     */
    public function contactNumber(): MobileNumber;
}