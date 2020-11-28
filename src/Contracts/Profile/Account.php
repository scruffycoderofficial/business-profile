<?php

namespace DigitalClosuxe\Business\Profile\Contracts\Profile
{
    /**
     * Class Account
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    interface Account extends Profile
    {
        /**
         * A business Profile may or may not have settings
         */
        public function hasSettings(): bool;
    }
}