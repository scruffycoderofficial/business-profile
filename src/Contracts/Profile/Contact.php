<?php

namespace DigitalClosuxe\Business\Profile\Contracts\Profile
{
    use DigitalClosuxe\Business\Profile\Contracts\Contact\{ 
        EmailAddress, 
        MobileNumber 
    };
    
    /**
     * Class Contact
    * 
    * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    interface Contact extends Profile
    {
        /**
         * An email address treated as primary for this Contact
         */
        public function contactEmail(): EmailAddress;

        /**
         * A mobile number treated as primary for this Contact
         */
        public function mobileNumber(): MobileNumber;
    }
}