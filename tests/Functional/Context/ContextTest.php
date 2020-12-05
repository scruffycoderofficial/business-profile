<?php

namespace DigitalClosuxe\Business\Profile\Tests\Functional\Context
{
    use Illuminate\Events\Dispatcher;
    
    use Symfony\Component\DependencyInjection\ContainerBuilder;

    use DigitalClosuxe\Business\Profile\{ 
        Tests\TestCase, 
        Context\Context, 
        Profile 
    };
    use DigitalClosuxe\Business\Profile\Context\Events\ContextInitialized;
    use DigitalClosuxe\Business\Profile\DatadabaseAdapter;

/**
     * Class ContextTest
     * 
     * @covers Context::
     */
    class ContextTest extends TestCase
    {
        /**
         * @var Context $context
         */
        protected $context;

        public function setUp(): void
        {
            //turn off running of migration

            $containerBuilder = new ContainerBuilder();
            $this->context = new TestProfile($containerBuilder);
        }

        /** @test */
        public function it_can_listen_to_triggered_events_with_attached_event_name_and_listener()
        {
            /** @var Context $$this->context */
            $this->context->trigger(new ContextInitialized($this->context));

            /** @var ContainerBuilder $containerBuilder */
            $containerBuilder = $this->context->getContainerBuilder();

            self::assertTrue($containerBuilder->has(DatadabaseAdapter::class));
        }

        /** @test */
        public function it_has_database_parameters_through_generic_configuration_initializer()
        {
            /** @var Context $$this->context */
            $this->context->trigger(new ContextInitialized($this->context));

            /** @var ContainerBuilder $containerBuilder */
            $containerBuilder = $this->context->getContainerBuilder();

            self::assertTrue($containerBuilder->hasParameter('database_driver'));
        }

        public function tearDown(): void
        {
            //turn off running of migration
        }
    }

    class TestProfile extends Profile{}
}