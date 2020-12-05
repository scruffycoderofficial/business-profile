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
         * @param ContextInitialized $event
         */
        public function handle(ContextInitialized $event)
        {
            /** @var Profile $profile */
            $profile = $event->getProfileContext();

            if (is_null($profile->getContainerBuilder())) {
                throw new \Exception("Profile Context is missing Contaijner Builder.");
            }

            $containerBulder = $profile->getContainerBuilder();
            $serviceYamlResourceFilePath = $profile->getConfigPath();
            
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