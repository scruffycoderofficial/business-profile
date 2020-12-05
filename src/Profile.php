<?php

namespace DigitalClosuxe\Business\Profile
{
    use DigitalClosuxe\Business\Profile\Context\Context;
/**
     * Class Profile
     */
    class Profile extends Context
    {
        /**
         * @var array $initializers
         */
        protected $initializers = [];
        /**
         * @param string $className
         * @return void
         */
        public function addInitializer($className)
        {
            if (!class_exists($className)) {
                throw new \Exception("{$className} class could be found.");
            }

            $this->initializers[] = $className;
        }

        public function hasInitializers()
        {
            return empty($this->initializers);
        }

        public function getInitializers()
        {
            return $this->initializers;
        }

        /**
         * @return string
         */
        public function getConfigPath()
        {
            $path = __DIR__ . '/Context/Resources';

            if (is_dir($path) && !is_readable($path)) {
                throw new \Exception('Cannot locate service configuration path.');
            }

            return __DIR__ . '/Context/Resources';
        }

        public function getContainerBuilder()
        {
            if (is_null($this->containerBuilder)) {
                throw new \Exception('Missing ContainerBuilder for this module.');
            }

            return $this->containerBuilder;
        }
    }
}