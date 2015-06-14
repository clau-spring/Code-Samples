<?php

namespace CodeSamples;
include 'DataBaseConnectionFactory.php';

class SetUpDataBase {
    public function createUser($username, $email, $password) {
        // Creating a new connection to the DB
        $connection = DataBaseConnectionFactory::create();
        try {
            $query = $connection->prepare("INSERT INTO `user_login` "
                . " (`username`, `email`, `password`) "
                . " VALUES (:username, :email, :password); "
            );

            // Binding variables
            $query->execute([
                'username' => $username,
                'email' => $email,
                'password' => $password
            ]);
        } catch (Exception $e) {
            echo 'Error while quering';
        }
    }

}

$new_user = new SetUpDataBase();
$new_user->createUser('Vanessa1', 'vanessa@gmail.com', '111');
