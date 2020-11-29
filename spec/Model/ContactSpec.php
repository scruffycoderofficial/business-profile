<?php

namespace spec\DigitalClosuxe\Business\Profile\Model;

use PhpSpec\ObjectBehavior;

use DigitalClosuxe\Business\Profile\Entity\Contact\{
    EmailAddress,
    MobileNumber
};

use DigitalClosuxe\Business\Profile\{ 
    Contracts\Profile\Contact as BusinessContact,
    Model\Contact
};

class ContactSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('john.doe@example.com', '083-123-45678');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Contact::class);
    }

    function it_is_a_business_contact()
    {
        $this->shouldImplement(BusinessContact::class);
    }

    function it_has_email_address_as_primary_contactable_email_address()
    {
        $this->contactEmail()->shouldHaveType(EmailAddress::class);
    }

    function it_has_mobile_number_as_primary_contactable_mobile_number()
    {
        $this->mobileNumber()->shouldHaveType(MobileNumber::class);
    }
}
