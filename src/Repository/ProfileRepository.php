<?php

namespace DigitalClosuxe\Business\Profile\Repository
{
    use DigitalClosuxe\Business\Profile\Model\Profile;
    use DigitalClosuxe\Business\Profile\Identity\ProfileId;

    interface ProfileRepository
    {
        public function byId(ProfileId $profileId);

        public function save(Profile $profile);
    }
}