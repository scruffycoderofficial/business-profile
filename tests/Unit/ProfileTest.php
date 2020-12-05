<?php

namespace DigitalClosuxe\Business\Profile\Tests\Unit
{
    use Illuminate\Events\Dispatcher;
    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use DigitalClosuxe\Business\Profile\{ Tests\TestCase, Profile };

/**
     * Class ProfileTest
     * 
     * @covers Profile::
     */
    class ProfileTest extends TestCase
    {
        /**
         * @var ContainerBuilder $containerBuilder
         */
        protected $containerBuilder;

        /**
         * @var Profile $profile
         */
        protected $profile;

        /** [@inheritdoc] */
        public function setUp(): void
        {
            //Turn off migration

            $containerBuilder = new ContainerBuilder();

            $containerBuilder->register('profile.events.manager', Dispatcher::class);

            $this->containerBuilder = $containerBuilder;

            /** @var  Profile  $testProfile */
            $this->profile = $this->getProfile(
                $this->containerBuilder
            );
        }

        /** @test */
        public function it_can_add_an_initializer_by_class_name()
        {
            $this->profile
                ->expects($this->atLeastOnce())
                ->method('addInitializer')
                ->willReturn(null);

                $this->profile->addInitializer(\stdClass::class);

                $this->profile
                ->expects($this->atMost(2))
                ->method('getInitializers')
                ->willReturn([\stdClass::class]);

            self::assertNotEmpty($this->profile->getInitializers());

            $initializerClassNameByIndex = $this->profile->getInitializers()[0];

            self::assertSame(\stdClass::class, $initializerClassNameByIndex);
        }

         /** @test */
        public function it_can_not_add_an_initializer_if_it_does_not_exists() 
        {
            $this->expectException(\Exception::class);

            $this->profile
                ->expects($this->atLeastOnce())
                ->method('addInitializer')
                ->willReturnCallback(function(){
                    throw new \Exception();
                });

                $this->profile->addInitializer(\stdClass::class);
        }

        /** @test */
        public function it_returns_true_when_it_has_initializers()
        {
            $this->profile
                ->expects($this->atLeastOnce())
                ->method('hasInitializers')
                ->willReturn(true);

            self::assertTrue($this->profile->hasInitializers());
        }

        /** @test */
        public function it_returns_false_when_it_has_no_initializers()
        {
            $this->profile
                ->expects($this->atLeastOnce())
                ->method('hasInitializers')
                ->willReturn(false);

            self::assertFalse($this->profile->hasInitializers());
        }

        /** @test */
        public function it_returns_configuration_path_for_services_yaml_file()
        {
            $this->profile
                ->expects($this->atLeastOnce())
                ->method('getConfigPath')
                ->willReturn(__DIR__);

            self::assertIsString($this->profile->getConfigPath());    
        }

        /** @test */
        public function it_fails_if_configuration_path_for_services_yaml_file_is_invalid()
        {
            $this->expectException(\Exception::class);

            $noneExistantDir = '';

            $this->profile
                ->expects($this->atLeastOnce())
                ->method('getConfigPath')
                ->willReturnCallback(function() use($noneExistantDir){
                    if (!is_dir($noneExistantDir) && !is_readable($noneExistantDir)) {
                        throw new \Exception();
                    }
                });

                $this->profile->getConfigPath();    
        }

        /** @test */
        public function it_returns_a_container_builder_for_this_profile()
        {
            $this->profile
                ->expects($this->atLeastOnce())
                ->method('getContainerBuilder')
                ->willReturnCallback(function(){
                    return new ContainerBuilder();
                });

            self::assertInstanceOf(ContainerBuilder::class, $this->profile->getContainerBuilder());    
        }

        /** @test */
        public function it_fails_if_a_container_builder_for_this_profile_has_not_been_set()
        {
            $this->expectException(\Exception::class);

            $this->profile
                ->expects($this->atLeastOnce())
                ->method('getContainerBuilder')
                ->willReturnCallback(function(){
                    throw new \Exception();
                });

                $this->profile->getContainerBuilder(); 
        }

        private function getProfile($containerBuilder)
        {
            return $this->getMockBuilder(Profile::class)
                ->disableOriginalConstructor()
                ->onlyMethods(['getInitializers', 'addInitializer', 'hasInitializers', 'getConfigPath', 'getContainerBuilder'])
                ->getMock();
        }

        public function tearDown(): void
        {
            //Turn off migration
        }
    }
}