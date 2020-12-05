<?php

namespace DigitalClosuxe\Business\Profile\Context\Initializer
{
    use Symfony\Component\Config\FileLocator;
    use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

    use DigitalClosuxe\Business\Profile\Context\Events\ContextInitialized;

/**
     * Class ServiceConfigurationInitializer
     */
    final class ServiceConfigurationInitializer
    {
        /**
         * @param Prifile $profile
         */
        public function handle(ContextInitialized $event)
        {
            if (is_null($event->getProfileContext()->getContainerBuilder())) {
                throw new \Exception("Profile Service event is missing a Container Builder.");
            }

            $containerBulder = $event->getProfileContext()->getContainerBuilder();
            $serviceYamlResourceFilePath = $event->getProfileContext()->getConfigPath();
            
            $this->loadConfiguration($containerBulder, $serviceYamlResourceFilePath);
        }

        /**
         * @param string $path
         */
        private function loadConfiguration($containerBuilder, $path)
        {
            $loader = new YamlFileLoader($containerBuilder, new FileLocator($path));

            $loader->load('services.yaml');
        }
    }
}