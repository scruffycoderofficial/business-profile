<?php

namespace DigitalClosuxe\Business\Profile
{
    use DigitalClosuxe\Business\Profile\Model\Profile;
    use DigitalClosuxe\Business\Profile\Identity\ProfileId;
    use DigitalClosuxe\Business\Profile\Repository\ProfileRepository;

    final class DefaultProfileRepository implements ProfileRepository
    {
        private $db;

        public function __construct(\PDO $db)
        {
            $this->db = $db;
        }

        public function byId(ProfileId $profileId)
        {
            
        }

        public function save(Profile $profile)
        {
            
        }
    }
}