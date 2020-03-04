<?php
session_start();
if(isset($_SESSION['USER_TYPE'])!="admin") {
    header('Location: login.php');
    exit();
}
?>
<?php
    require "DBDoc.php";
    $dbDoc=new DBDoc();
    $docRes=$dbDoc->getDocument();
?>
<?php
    if(isset($_GET['search']))
    {
        $key=$_GET['key'];
        $docRes=$dbDoc->getDocumentByKey($key);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>View NID & License</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body style="font-family: serif; font-size: 16px; background: #000; color: #fff;">
<?php include "nav-admin.php"?>
<div class='container' align="center">
    <br>
    <button class="btn btn-primary" style="background: red;width: 500px;font-size: 17px">All Valid NID,Driving License & Vehicle License</button>
    <hr style="width: 500px">
    <form action="view-nid-license.php" method="get" style="width: 500px">
        <input style="color: black" type="text" name="key" class="form-control" placeholder="Enter NID or driving license or vehicle license">
        <br/>
        <button style="background: #00007d;width: 500px;font-size: 17px" type="submit" name="search" class="btn btn-primary">Search</button>

    </form>
    <br/>
    <table class='table table-bordered'>
        <tr align="center">
            <th>ID</th>
            <th>User NID</th>
            <th>Driving License</th>
            <th>Vehicle License</th>
        </tr>
        <?php foreach ($docRes as $res){?>
            <tr align="center">
                <td><?php echo $res['id']?></td>
                <td><?php echo $res['nid']?></td>
                <td><?php echo $res['drivingLicense']?></td>
                <td><?php echo $res['vehicleLicense']?></td>
            </tr>
        <?php }?>
    </table>
</div>
<br>
<?php include "footer.php"?>
</body>
</html>