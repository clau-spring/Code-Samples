<?php

include 'connection.php';
namespace CodeSamples;

/**
* Factory class for creating connections
*/
class DataBaseConnectionFactory {

    public static function create() {
        $connection = new Connection();
        return $connection->getConnection();
    }
}