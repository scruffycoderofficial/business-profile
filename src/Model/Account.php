<?php

namespace DigitalClosuxe\Business\Profile\Model
{
    use DigitalClosuxe\Business\Profile\Concerns\{ Profile, Setting };
    use DigitalClosuxe\Business\Profile\Contracts\Profile\Account as BusinessAccount;

    /**
     * Class Account
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    class Account implements BusinessAccount
    {
        use Profile, Setting;
    }
}
