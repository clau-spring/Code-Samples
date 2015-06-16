<?php
namespace CodeSamples;
include 'QueryDataBase.php';
// start the session
session_start();
$error = '';
$username = '';
$password = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    } else {
        // define username and password
        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        $check_user = new QueryDataBase();
        $result = $check_user->checkUserDetails($username, $password);

        if ($result) {
            $_SESSION['login_user'] = $username;
            header("location: src/UserProfile.php");
        } else {
            $error = "Username or Password is invalid";
        }
    }
}