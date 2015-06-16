<?php

namespace CodeSamples;
use PDO;

include 'DataBaseConnectionFactory.php';

class QueryDataBase {
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

    public function checkUserDetails($username, $hash) {
        $connection = DataBaseConnectionFactory::create();
        try {
            $query = $connection->prepare("SELECT `username`, `password`"
                ." FROM `user_login`"
                ." WHERE  `username` = :username AND `password` = :password;"
            );
            // Binding variables
            $query->execute([
                'username' => $username,
                'password' => $hash
            ]);

            $query->setFetchMode(PDO::FETCH_OBJ);

            while ($row = $query->fetch()) {
                if (isset($row)) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            echo 'Details not found';
        }
    }

    public function logOut() {
        session_start();
        // Destroying all sessions
        if (session_destroy()) {
            // Redirecting To Home Page
            header("Location: /index.php");
        }
    }

    public function userSession() {
        $connection = DataBaseConnectionFactory::create();
        session_start();
        $user_check = $_SESSION['login_user'];

        try {
            $query = $connection->prepare("SELECT `username`, `email`"
                ." FROM `user_login`"
                ." WHERE  `username` = :username;"
            );

            $query->execute([
                'username' => $user_check
            ]);

            $query->setFetchMode(PDO::FETCH_ASSOC);

            while ($row = $query->fetch()) {
                if (isset($row['username'])) {
                    return $row['username'];
                } else {
                    header('Location: /index.php');
                }
            }
        } catch (Exception $e) {
            echo 'Error while quering';
        }
    }
}