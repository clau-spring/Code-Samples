<?php
    namespace CodeSamples;
    include 'QueryDatabase.php';

    $query = new QueryDatabase();
    $login_session = $query->userSession();
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <b id="logout"><a href="LogOut.php">Log Out</a></b>
    </div>
</body>
</html>