<?php

namespace DigitalClosuxe\Business\Profile\Model{

    use DigitalClosuxe\Business\Profile\Entity\Contact\{
        EmailAddress,
        MobileNumber
    };

    use DigitalClosuxe\Business\Profile\Contracts\{
        Profile\Contact as BusinessContact
    };

    use DigitalClosuxe\Business\Profile\Concerns\{ 
        Contact as ContactConcern,
        Profile  as ProfileConcern
    };

    /**
     * Class Contact
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    class Contact implements BusinessContact
    {
        use ProfileConcern, ContactConcern;

        public function __construct($emailAddress, $mobileNumber, $profile = null) 
        {
            $this->emailAddress = new EmailAddress($emailAddress);
            $this->mobileNumber = new MobileNumber($mobileNumber);
        }
    }
}
