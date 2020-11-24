<?php

namespace DigitalClosuxe\Business\Profile\Service
{
    use DigitalClosuxe\Business\Profile\Repository\ProfileRepository;

    final class ProfileService
    {
        private $profileRepository;

        public function __construct(ProfileRepository $profileRepository)
        {
            $this->profileRepository = $profileRepository;
        }

        public function createProfile($contact, $account)
        {
            
        }
    }
}