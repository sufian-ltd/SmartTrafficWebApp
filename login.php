<?php
    session_start();
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        if($email=="admin@admin.com" && $password=="admin")
        {
            $_SESSION["USER_TYPE"]="admin";
            header('Location: admin-section.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>Smart Traffic Web App</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body style="background: black;color: #fff;font-family: serif;font-size: 16px">
<?php include "nav-home.php" ?>
<div class="container" align="center">
    <h3>Admin Login</h3>
    <hr>
    <br>
    <form action="login.php" method="post" style="width: 500px">
        <div class="form-group">
            <label for="email1">Enter Valid Email address</label>
            <input type="email" class="form-control" name="email" id="email1" placeholder="Enter Valid Email address" />
        </div>
        <div class="form-group">
            <label for="password1">Enter Valid Password</label>
            <input type="password" class="form-control" name="password" id="password1" placeholder="Enter Valid Password" />
        </div>
        <button style="background: #00007d;width: 500px;font-size: 17px" type="submit" name="login" class="btn btn-primary">Click here to Login</button>
    </form>
    <br/>
</div>
<?php include "footer.php"?>
</body>
</html>