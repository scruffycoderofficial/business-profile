<?php

namespace DigitalClosuxe\Business\Profile\Testing\Concerns
{
    use Illuminate\{ 
        Container\Container, 
        Events\Dispatcher
    };

    use Illuminate\Database\{ 
        ConnectionResolverInterface, 
        Capsule\Manager as Capsule
    };

    use Illuminate\Database\Migrations\{ 
        MigrationRepositoryInterface, 
        DatabaseMigrationRepository,
        Migrator 
    };

    /**
     * Class DatabaseMigrations
     * 
     * @author Siko Luyanda <luyanda.siko@digital-closuxe.co.za>
     */
    trait DatabaseMigrations
    {
        /**
         * @var array $paths Paths where migration files are stored
         */
        private $paths = [];

        /**
         * @var Capsule $capsule Database Manager
         */
        private $capsule;

        /**
         * @var Container $container A PSR-Compliant container implementation
         */
        private $container;

        /**
         * @var Migrator $migrator An object responsible for managing our Database migrations and their processing
         */
        private $migrator;

        /**
         * Creates Database connection for persistency
         * 
         * @param array $configs Database connection configurations
         * @param array $paths Paths where migration files are stored
         * @param boolean $bootEloquent Whether to enable Eloquent models
         * @return void
         */
        public function createConnection(array $configs, array $paths, $bootEloquent = false)
        {
            $this->paths = $paths;

            $this->capsule = new Capsule();

            $this->setConnectionConfigs($this->capsule, $configs);

            if ($bootEloquent) {
                $this->bootEloquent();
            }

            $this->configureContainerBindings();

            $this->migrator = $this->container->make(Migrator::class);
        }

        /**
         * Executes given migrations
         * 
         * @param array $paths Paths where migration files are stored
         * @return void
         */
        public function migrate(array $paths = [])
        {
            $this->migrator->run($this->paths);
        }

        /**
         * Reverts execution of migrations backwards
         * 
         * @param array $paths Paths where migration files are stored
         * @return void
         */
        public function rollback(array $paths = [])
        {
            $this->migrator->rollback($this->paths);
        }

        public function getCapsule()
        {
            return $this->capsule;
        }

        /**
         * Sets connection configurations
         * 
         * @param Capsule $capsule Database Manager
         * @param array $paths Paths where migration files are stored
         * @return void
         */
        private function setConnectionConfigs($capsule, $configs)
        {
            if ($configs['driver'] !== 'sqlite' && $configs['database'] !== ':memory:') {
                throw new \RuntimeException('Only an in-memory database is supported for modules.');
            }

            $capsule->addConnection($configs);
        }

        /**
         * Boots Eloquent and sets the Database Manager to be accessible globally
         * 
         * @return void
         */
        private function bootEloquent()
        {
            $this->capsule->setEventDispatcher(
                new Dispatcher(
                    new Container
                )
            );

            $this->capsule->setAsGlobal();
            $this->capsule->bootEloquent();
        }

        /**
         * Binds required classes onto the Container
         * 
         * @return void
         */
        private function configureContainerBindings()
        {
            $this->container = Container::getInstance();

            $dbManager = $this->capsule->getDatabaseManager();

            $databaseMigrationRepository = new DatabaseMigrationRepository($dbManager, 'migrations');
            
            if (!$databaseMigrationRepository->repositoryExists()) {
                $databaseMigrationRepository->createRepository();
            }

            $this->container->instance(MigrationRepositoryInterface::class, $databaseMigrationRepository);
            $this->container->instance(ConnectionResolverInterface::class, $dbManager);
        }
    }
}