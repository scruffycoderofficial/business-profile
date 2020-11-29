<?php

namespace DigitalClosuxe\Business\Profile\Concerns
{
    use DigitalClosuxe\Business\Profile\Contracts\Contact\{ EmailAddress, MobileNumber };

    /**
     * Class Contact
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    trait Contact
    {
        /**
         * @var EmailAddress $emailAddress
         */
        protected $emailAddress;

        /**
         * @var MobileNumber $mobileNumber
         */
        protected $mobileNumber;

        /**
         * @return EmailAddress
         */
        public function contactEmail(): EmailAddress
        {
            if (!$this->emailAddress instanceof EmailAddress) {
                throw new \Exception('Invalid Email Address type.');
            }

            return $this->emailAddress;
        }

        /**
         * @return MobileNumber
         */
        public function mobileNumber(): MobileNumber
        {
            if (!$this->mobileNumber instanceof MobileNumber) {
                throw new \Exception('Invalid Mobile Number type.');
            }

            return $this->mobileNumber;
        }
    }
}