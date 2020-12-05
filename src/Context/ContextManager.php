<?php

namespace DigitalClosuxe\Business\Profile\Context
{
    /**
     * Class ContextManager
     */
    trait ContextManager
    {
        /**
         * @param string $key
         */
        public function getProfileManager(string $key) 
        {
            return $this->containerBuilder->get("profile.{$key}.manager");
        }

        /**
         * @param string $key
         * @param string $concreteClass
         */
        public function setProfileManager($key, $concreteClass)
        {
            $this->containerBuilder->register("profile.{$key}.manager",  $concreteClass);
        }
    }
}