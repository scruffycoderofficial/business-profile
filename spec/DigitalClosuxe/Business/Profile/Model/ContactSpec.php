<?php

namespace spec\DigitalClosuxe\Business\Profile\Model;

use PhpSpec\ObjectBehavior;
use DigitalClosuxe\Business\Profile\Model\Contact;
use DigitalClosuxe\Business\Profile\Contracts\Contact as ContactProfile;

class ContactSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Contact::class);
    }

    function it_is_business_profile_model()
    {
        $this->shouldImplement(ContactProfile::class);
    }
}
