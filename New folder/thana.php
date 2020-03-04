<?php
    session_start();
    if(isset($_POST['login']))
    {
        $id=$_POST['thana'];
        $password=$_POST['password'];
        if($id=="1" && $password=="12345")
        {
            $_SESSION["thanaId"]=$id;
            $_SESSION["thanaName"]="Pachlaish Thana";
            $_SESSION["USER_TYPE"]="thana";
            header('Location: thana-case.php');
        }
        else if($id=="2" && $password=="67890")
        {
            $_SESSION["thanaId"]=$id;
            $_SESSION["thanaName"]="Chadgao Thana";
            $_SESSION["USER_TYPE"]="thana";
            header('Location: thana-case.php');
        }
        else if($id=="3" && $password=="13579")
        {
            $_SESSION["thanaId"]=$id;
            $_SESSION["thanaName"]="Kotohali Thana";
            $_SESSION["USER_TYPE"]="thana";
            header('Location: thana-case.php');
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
<?php include "nav-thana.php" ?>
<div class="container" align="center">
    <h3>Login Panel</h3>
    <hr>
    <br>
    <form action="thana.php" method="post" style="width: 500px">
        <div class="form-group">
            <label for="email1">Select Thana</label>
            <select name="thana" class="form-control">
                <option value="1">Pachlaish Thana</option>
                <option value="2">Chadgao Thana</option>
                <option value="3">Kotohali Thana</option>
            </select>
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