<?php

namespace DigitalClosuxe\Business\Profile\Contracts\Profile
{
    /**
    * Class Profile
    * 
    * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
    */
    interface Profile
    {
        /**
         * Whether this Profile is active or not
         */
        public function isActive(): bool;

        /**
         * Days Profile has been active in a Human-Readable format
         */
        public function daysSinceActive(): string;
    }
}