<?php
    session_start();
    if(isset($_SESSION['USER_TYPE'])!="admin") {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Smart Traffic Web App</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body style="background: black;">
<?php include "nav-admin.php" ?>
<?php include "slider.php" ?>
<?php include "footer.php" ?>
</body>
</html>