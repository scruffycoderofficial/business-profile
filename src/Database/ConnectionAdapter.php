<?php

namespace DigitalClosuxe\Business\Profile\Database
{
    /**
     * Class ConnectionAdapter
     */
    final class ConnectionAdapter
    {
        /**
         * var Capsule $connection
         */
        protected $connection = null;

        /**
         * Class constructor
         * 
         * @param Capsule $connection
         */
        public function setConnectionManager($connection)
        {
            $this->connection = $connection;
        }

        /**
         * Whether a connection instance has been set or not
         */
        public function hasConnection()
        {
            return !is_null($this->connection);
        }

        /**
         * @return Capsule $connection
         */
        public function getConnection()
        {
            return $this->connection->getConnection();
        }

        /**
         * Gets a table instance with given name
         */
        public function getTable($tableName)
        {
            return $this->connection->table($tableName);
        }
    }
}