<?php

namespace DigitalClosuxe\Business\Profile\Contracts\Profile
{
    use DigitalClosuxe\Business\Profile\Contracts\Profile\Contact\{ EmailAddress, MobileNumber };
    
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
         * An mobile number treated as primary for this Contact
         */
        public function contactNumber(): MobileNumber;
    }
}