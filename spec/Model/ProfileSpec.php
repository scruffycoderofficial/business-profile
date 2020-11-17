<?php

namespace spec\DigitalClosuxe\Business\Profile\Model;

use PhpSpec\ObjectBehavior;

use DigitalClosuxe\Business\Profile\Model\{ 
    Account, 
    Contact, 
    Profile 
};

class ProfileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Profile::class);
    }

    function it_has_a_contact_profile()
    {
        $this->getContact()->shouldHaveType(Contact::class);
    }

    function it_has_an_account_profile()
    {
        $this->getAccount()->shouldHaveType(Account::class);
    }
}
