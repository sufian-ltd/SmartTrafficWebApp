<?php
    session_start();
    if(isset($_SESSION['USER_TYPE'])!="admin") {
        header('Location: login.php');
        exit();
    }
?>
<?php
    $msg="";
    require "DBUser.php";
    $dbUser=new DBUser();
    if(isset($_GET['action']))
    {
        $action=$_GET['action'];
        $id=$_GET['id'];
        if($action=="accept")
        {
            $dbUser->acceptRequest($id);
            $msg="accept";
        }
        else if($action=="reject")
        {
            $dbUser->rejectRequest($id);
            $msg="reject";
        }
    }
    $userRes=$dbUser->getPendingRequest();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>View Pending Request</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body style="font-family: serif; font-size: 16px; background: #000; color: #fff;">
<?php include "nav-admin.php"?>
<div class='container' align="center">
    <br/>
    <button class="btn btn-primary" style="background: red;width: 500px;font-size: 17px">Here is the list of all pending request</button>
    <hr style="width: 500px">
    <br>
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
            <th>Request</th>
            <th>Request</th>
        </tr>
        <?php foreach ($userRes as $res) { ?>
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
                <td>
                    <?php echo "<a style='background:#00007d;color:white' class='btn btn-success' href='pending-request.php?action=accept&id=" . $res['id'] . "'>Accept</a>"; ?>
                </td>
                <td>
                    <?php echo "<a style='background:red;color:white' class='btn btn-danger' href='pending-request.php?action=reject&id=" . $res['id'] . "'>Reject</a>"; ?>
                </td>
            </tr>
        <?php }?>
    </table>
</div>
<br>
<?php include "footer.php"?>
</body>
</html>