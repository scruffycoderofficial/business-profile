<?php

namespace DigitalClosuxe\Business\Profile\Repository
{
    use DigitalClosuxe\Business\Profile\Database\ConnectionAdapter;

    /**
     * Class Repository
     */
    class Repository
    {
        protected $tableName;

        protected $connectionAdapter;

        public function __construct(ConnectionAdapter $connectionAdapter)
        {
            $this->connectionAdapter = $connectionAdapter;
        }

        public function getAll()
        {
            return $this->getTable()->get();
        }

        protected function getTable()
        {
            return $this->connectionAdapter->getTable($this->tableName);
        }
    }
}