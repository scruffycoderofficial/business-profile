<?php

namespace DigitalClosuxe\Business\Profile\Contracts;

/**
 * Class EmailAddress
 * 
 * Email addresses are treated as Value-Objects
 * 
 * NB: Within the Business Context EmailAddress Value-Objects 
 * defualt to primary as means to  reachout to Profile Owners
 */
interface EmailAddress extends PrimaryContact
{
}