<?php

namespace DigitalClosuxe\Business\Profile\Concerns
{
    /**
     * Class Profile
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    trait Profile
    {
        /**
         * @var boolean $isActive
         */
        protected $isActive = false;

        /**
         * @var string $daysSinceActive
         */
        protected $daysSinceActive;

        /** [@inheritdoc] */
        public function isActive(): bool
        {
            return $this->isActive;
        }

        /** [@inheritdoc] */
        public function daysSinceActive(): string
        {
            return $this->daysSinceActive;
        }
    }
}