<?php

namespace DigitalClosuxe\Business\Profile\Testing
{
    use Illuminate\Events\Dispatcher;
    use Illuminate\Container\Container;
    use Illuminate\Database\Migrations\Migrator;
    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Database\ConnectionResolverInterface;
    use Illuminate\Database\Migrations\DatabaseMigrationRepository;
    use Illuminate\Database\Migrations\MigrationRepositoryInterface;

    trait DatabaseMigrations
    {
        private $paths = [];

        private $capsule;

        private $container;

        private $migrator;

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

        public function migrate(array $paths = [])
        {
            $this->migrator->run($this->paths);
        }

        public function rollback(array $paths = [])
        {
            $this->migrator->rollback($this->paths);
        }

        private function setConnectionConfigs($capsule, $configs)
        {
            if ($configs['driver'] !== 'sqlite' && $configs['database'] !== ':memory:') {
                throw new \RuntimeException('Only an in-memory database is supported for modules.');
            }

            $capsule->addConnection($configs);
        }

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

        private function configureContainerBindings()
        {
            $this->container = Container::getInstance();

            $dbManager = $this->capsule->getDatabaseManager();

            $databaseMigrationRepository = new DatabaseMigrationRepository($dbManager, 'migration');
            
            if (!$databaseMigrationRepository->repositoryExists()) {
                $databaseMigrationRepository->createRepository();
            }

            $this->container->instance(MigrationRepositoryInterface::class, $databaseMigrationRepository);
            $this->container->instance(ConnectionResolverInterface::class, $dbManager);
        }
    }
}