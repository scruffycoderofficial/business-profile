<?php

namespace DigitalClosuxe\Business\Profile\Tests\Functional\Model\Entity;

use DigitalClosuxe\Business\Profile\{
    Database\ConnectionAdapter,
    Tests\TestCase
};

use DigitalClosuxe\Business\Profile\Entity\{ Profile };
use DigitalClosuxe\Business\Profile\Repository\ProfileRepository;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ProfileRepositoryTest
 * 
 * @covers ProfileRepository::
 */
class ProfileRepositoryTest extends TestCase
{
    protected $containerBuilder;

    public function setUp(): void
    {
        parent::setUp();

    
        $this->containerBuilder = new ContainerBuilder();

        $this->containerBuilder->register('database.connection.adapter', ConnectionAdapter::class);

        $this->containerBuilder->get('database.connection.adapter')
            ->setConnectionManager($this->getCapsule());

        $this->containerBuilder->register('profile.repository', ProfileRepository::class)
            ->addArgument(new Reference('database.connection.adapter'));
    }

    /**
     * @test
     */
    public function it_can_access_database_table_using_connection_manager_with_profile_repository()
    {
        //Get the ProfileRepository
        $profileRepository = $this->containerBuilder->get('profile.repository');

        //Insert a single record to teh Database using Eloquent model
        Profile::create(['crm_ref' => ProfileTest::PROFILE_PROPS['crm_ref']]);

        //Assert that only a single row is available
        self::assertCount(1, $profileRepository->getAll());

        //Create another Profile entry
        Profile::create(['crm_ref' => 'another Profile instance']);

        //Assert that the collection has two items
        self::assertCount(2, $profileRepository->getAll());
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}