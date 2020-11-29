<?php

namespace DigitalClosuxe\Business\Profile\Model
{
    use DigitalClosuxe\Business\Profile\Concerns\{ 
        Profile as ProfileConcern, 
        Contact as ContactConcern, 
        Setting as SettingConcern
    };

    use DigitalClosuxe\Business\Profile\Contracts\Profile\{ 
        Account as BusinessAccount, 
        Contact as BusinessContact
    };

    /**
     * Class Profile
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    class Profile implements BusinessContact, BusinessAccount 
    {
        use ProfileConcern, ContactConcern, SettingConcern;

        public function hasSettings(): bool
        {
            return (empty($this->settings));
        }

        /**
         */
        public function getContact()
        {
            return new Contact('john.doe@example.com', '083-123-45678');
        }

        /**
         */
        public function getAccount()
        {
            return new Account;
        }
    }
}