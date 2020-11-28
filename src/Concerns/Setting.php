<?php

namespace DigitalClosuxe\Business\Profile\Concerns
{
     /**
     * Class Setting
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    trait Setting
    {
        /**
         * @var array $settings
         */
        protected $settings = [];

        /** [@inheritdoc] */
        public function hasSettings(): array
        {
            return $this->settings;
        } 
    }
}