<?php

namespace spec\DigitalClosuxe\Business\Profile\Model;

use PhpSpec\ObjectBehavior;

use DigitalClosuxe\Business\Profile\{
    Contracts\Profile\Account as ProfileBusinessAccount,
    Model\Account
};

/**
 * Class AccountSpec
 * 
 * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
 */
class AccountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Account::class);
    }

    function it_is_a_business_profile_account()
    {
        $this->shouldImplement(ProfileBusinessAccount::class);
    }

    public function it_has_settings()
    {
        $this->hasSettings()->shouldBeBool();
    }
}
