<?php

namespace DigitalClosuxe\Business\Profile\Tests\Functional\Database
{
    use DigitalClosuxe\Business\Profile\{
        Database\ConnectionAdapter,
        Tests\TestCase
    };
    
    use DigitalClosuxe\Business\Profile\Tests\Functional\Model\Entity\ProfileTest;

    use DigitalClosuxe\Business\Profile\Entity\{ Profile };

    use Symfony\Component\DependencyInjection\ContainerBuilder;

    /**
     * Class ManagerTest
     * 
     * @covers ConnectionAdapter::
     */
    class ConnectionAdapterTest extends TestCase
    {
        protected $containerBuilder;

        public function setUp(): void
        {
            $this->containerBuilder = new ContainerBuilder();

            $this->containerBuilder->register('database.connection.adapter', ConnectionAdapter::class);

            parent::setUp();
        }

        /**
         * @test
         */
        public function it_has_a_container_with_connection_manager()
        {
            self::assertInstanceOf(ConnectionAdapter::class, $this->containerBuilder->get('database.connection.adapter'));
        }

        /**
         * @test
         */
        public function it_has_method_to_set_connection_manager()
        {
            $databaseManager = $this->containerBuilder->get('database.connection.adapter');
            self::assertTrue(method_exists($databaseManager, 'setConnectionManager'));
        }

        /**
         * @test
         */
        public function it_can_set_current_connection_manager()
        {
            $databaseManager = $this->containerBuilder->get('database.connection.adapter');

            $databaseManager->setConnectionManager($this->getCapsule());
            self::assertTrue($databaseManager->hasConnection());
        }

        /**
         * @test
         */
        public function it_gets_resultset_from_table_using_connection_manager()
        {
            Profile::create(['crm_ref' => ProfileTest::PROFILE_PROPS['crm_ref']]);

            $databaseManager = $this->containerBuilder->get('database.connection.adapter');
            $databaseManager->setConnectionManager($this->getCapsule());

            self::assertCount(1, $databaseManager->getTable('profiles')->get());

            Profile::create(['crm_ref' => 'another Profile instance']);

            self::assertCount(2, $databaseManager->getTable('profiles')->get());
        }

        public function tearDown(): void
        {
            parent::tearDown();
        }
    }
}