<?php
    session_start();
    if(isset($_SESSION['USER_TYPE'])!="admin") {
        header('Location: login.php');
        exit();
    }
?>
<?php
    require "DBUser.php";
    $dbUser=new DBUser();
    $userRes=$dbUser->getApprovedUser();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>View Approved User</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body style="font-family: serif; font-size: 16px; background: #000; color: #fff;">
<?php include "nav-admin.php" ?>
<div class='container' align="center">
    <br/>
    <button class="btn btn-primary" style="background: red;width: 500px;font-size: 17px">All Approved Users</button>
    <hr style="width: 500px">
    <br/>
    <table class='table table-bordered'>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Password</th>
            <th>Contact</th>
            <th>NID</th>
            <th>Address</th>
            <th>Driving License</th>
            <th>Vehicle License</th>
            <th>Vehicle Type</th>
            <th>Valid/Invalid</th>
        </tr>
        <?php foreach ($userRes as $res){?>
            <tr>
                <td><?php echo $res['id']?></td>
                <td><?php echo $res['userName']?></td>
                <td><?php echo $res['password']?></td>
                <td><?php echo $res['contact']?></td>
                <td><?php echo $res['nid']?></td>
                <td><?php echo $res['address']?></td>
                <td><?php echo $res['drivingLicense']?></td>
                <td><?php echo $res['vehicleLicense']?></td>
                <td><?php echo $res['vehicle']?></td>
                <td>Valid User</td>
            </tr>
        <?php }?>
    </table>
</div>
<br>
<?php include "footer.php" ?>
</body>
</html>