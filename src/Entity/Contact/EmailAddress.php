<?php

namespace DigitalClosuxe\Business\Profile\Entity\Contact
{
    use DigitalClosuxe\Business\Profile\Contracts\Contact\EmailAddress as BusinessEmailAddress;

    /**
     * Class EmailAddress
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    final class EmailAddress implements BusinessEmailAddress
    {
        /**
         * @var mixed $value
         */
        private $value;

        /** Class Constructor */
        public function __construction($value = 'john.doe@example.com')
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