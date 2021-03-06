<?php

namespace CodeSamples;
use PDO;

/**
* Class to connect to the database
*/
class Connection {

    /**
    * Username to connect to the db
    * */
    private $username = 'root';

    /**
    * Data base name
    * */
    private $db_name = 'secure_login';

    /**
    * Object
    * */
    private $connection;

    /**
    * Function to get the connection object
    * */
    public function getConnection()
    {
        try {
        $this->connection = new PDO(
            'mysql:host=localhost;dbname=secure_login',
            'root',
            ''
        );

        // Setting error handling
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
            file_put_contents('PDO_log.log', $e->getMessage(), FILE_APPEND);
        }

        return $this->connection;
    }
}