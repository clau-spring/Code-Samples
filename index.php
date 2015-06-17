<?php
namespace CodeSamples;
include 'src/login.php';
// Redirecting if the user session is still active
if (isset($_SESSION['login_user'])) {
    header("location: src/UserProfile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<script type="text/javascript" href="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" href="js/login.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
    <div id="login">
        <h2>Login Form</h2>
        <form action="" method="post">
            <label>UserName :</label>
            <input id="username" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>
</body>
</html>