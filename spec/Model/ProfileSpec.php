<?php

namespace spec\DigitalClosuxe\Business\Profile\Model;

use PhpSpec\ObjectBehavior;

use DigitalClosuxe\Business\Profile\Model\Profile;
use DigitalClosuxe\Business\Profile\Contracts\AccountProfile;
use DigitalClosuxe\Business\Profile\Contracts\ContactProfile;

class ProfileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Profile::class);
    }

    function it_has_a_contact_profile()
    {
        $this->getContact()->shouldHaveType(ContactProfile::class);
    }

    function it_has_an_account_profile()
    {
        $this->getAccount()->shouldHaveType(AccountProfile::class);
    }
}
