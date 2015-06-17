<?php
namespace CodeSamples;
include 'QueryDataBase.php';
// start the session
session_start();
$error = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    $options = [
        'cost' => 11,
        'salt' => 'myOwnSaltCreatedForThis',
    ];
    $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    echo $hashed_password;

    if (empty($username) || empty($hashed_password)) {
        $error = "Username or Password is invalid";
    } else {
        // Converting to html entities any malicious characters
        $username_clean = htmlentities($username);

        $check_user = new QueryDataBase();
        $result = $check_user->checkUserDetails($username_clean, $hashed_password);

        if ($result) {
            $_SESSION['login_user'] = $username_clean;
            header("location: src/UserProfile.php");
        } else {
            $error = "Username or Password is invalid";
        }
    }
}