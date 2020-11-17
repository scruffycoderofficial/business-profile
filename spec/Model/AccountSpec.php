<?php

namespace spec\DigitalClosuxe\Business\Profile\Model;

use PhpSpec\ObjectBehavior;
use DigitalClosuxe\Business\Profile\Model\Account;
use DigitalClosuxe\Business\Profile\Contracts\AccountProfile;

class AccountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Account::class);
    }

    function it_is_a_business_profile_account_model()
    {
        $this->shouldImplement(AccountProfile::class);
    }

    public function it_knows_about_its_settings()
    {
        $this->hasSettings()->shouldBeBool();
    }
}
