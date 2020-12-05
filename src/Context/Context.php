<?php

namespace DigitalClosuxe\Business\Profile\Context
{
    use Illuminate\Events\Dispatcher;

    use Psr\Container\ContainerInterface;

    use DigitalClosuxe\Business\Profile\Context\{ 
        Initializer\GenericConfigurationInitializer,
        Initializer\ServiceConfigurationInitializer, 
        Events\ContextInitialized
    };

/**
     * Class Context
     */
    abstract class Context
    {
        use ContextManager;
        
         /**
         * $var ContainerBuilder $containerBuilder
         */
        protected $containerBuilder = null;

        /**
         * Class constructor
         * 
         * @param mixed $containerBuilder
         */
        public function __construct($containerBuilder)
        {
            if ($containerBuilder instanceof ContainerInterface) {
                $this->containerBuilder = $containerBuilder;
            }

            if (!$this->containerBuilder->has('profile.events.manager')) {
                $this->setProfileManager('events', Dispatcher::class);
            }

            $this->registerEvents($this);

            $this->trigger(
                new ContextInitialized($this)
            );
        }

        /**
         * Abitrarily triggers this Profile's events
         * 
         * @return mixed
         */
        public function trigger(...$args)
        {
            return $this->getProfileManager('events')->dispatch(...$args);
        }

        /**
         * Registers this Profile's services
         * 
         * @return void
         */
        protected function registerEvents()
        {
            $this->getProfileManager('events')->listen([ContextInitialized::class], GenericConfigurationInitializer::class);
            $this->getProfileManager('events')->listen([ContextInitialized::class], ServiceConfigurationInitializer::class);
        }
    }
}