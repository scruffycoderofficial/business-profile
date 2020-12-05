<?php

namespace DigitalClosuxe\Business\Profile\Context\Events
{
    use DigitalClosuxe\Business\Profile\Contracts\Profile\Profile;

    /**
     * Class ContextInitialized
     */
    class ContextInitialized
    {
        /**
         * @var Profile $profile
         */
        protected $profile;

        /**
         * Class constructor
         */
        public function __construct($profile)
        {
            $this->profile = $profile;
        }

        /**
         * Returns this context's subject
         * 
         * @return Profile
         */
        public function getProfileContext()
        {
            return $this->profile;
        }
    }
}