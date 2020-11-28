<?php

namespace DigitalClosuxe\Business\Profile\Model
{
    use DigitalClosuxe\Business\Profile\Contracts\Profile\Contact as BusinessContact;
    use DigitalClosuxe\Business\Profile\Concerns\{ Profile, Contact as ContactConcern };

    /**
     * Class Contact
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    class Contact implements BusinessContact
    {
        use Profile, ContactConcern;
    }
}
