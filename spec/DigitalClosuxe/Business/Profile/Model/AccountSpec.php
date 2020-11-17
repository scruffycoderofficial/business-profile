<?php

namespace spec\DigitalClosuxe\Business\Profile\Model;

use PhpSpec\ObjectBehavior;
use DigitalClosuxe\Business\Profile\Model\Account;
use DigitalClosuxe\Business\Profile\Contracts\Account as AccountProfile;

class AccountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Account::class);
    }

    function it_is_business_profile_model()
    {
        $this->shouldImplement(AccountProfile::class);
    }
}
