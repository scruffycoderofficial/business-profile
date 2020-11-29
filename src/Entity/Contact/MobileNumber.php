<?php

namespace DigitalClosuxe\Business\Profile\Entity\Contact
{
    use DigitalClosuxe\Business\Profile\Contracts\Contact\MobileNumber as BusinessMobileNumber;

    /**
     * Class MobileNumner
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    final class MobileNumber implements BusinessMobileNumber
    {
        /**
         * @var mixed $value
         */
        private $value;

        /** Class Constructor */
        public function __construction($value = '083-123-45678')
        {
            $this->value = $value;
        }

        /**
         * Returns this value
         * 
         * @return mixed
         */
        public function getValue()
        {
            return $this->value;
        }
    }
}