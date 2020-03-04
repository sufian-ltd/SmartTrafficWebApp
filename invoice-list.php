<?php
    session_start();
    if(isset($_SESSION['USER_TYPE'])!="admin") {
        header('Location: login.php');
        exit();
    }
?>
<?php
    require "DBPunishment.php";
    require "DBThana.php";
    $dbPunish=new DBPunishment();
    $dbThana=new DBThana();
    $userName=$_GET['userName'];
    $id=$_GET['id'];

    if(isset($_POST['caseAction'])){
        $case=$_POST['case'];
        $thanaCase=$_POST['thanaCase'];
        $invoiceId=$_POST['invoiceId'];

        if($case=="nothing" && $thanaCase!=0)
        {
            $msg="";
            if($thanaCase==1){
                $password="12345";
                $dbThana->addCase($password,$thanaCase,$invoiceId);
                $msg="This Case is Sent To Pachlaish Thana";
            }
            else if($thanaCase==2){
                $password="67890";
                $dbThana->addCase($password,$thanaCase,$invoiceId);
                $msg="This Case is Sent Chadgao Thana";
            }
            else if($thanaCase==3){
                $password="13579";
                $dbThana->addCase($password,$thanaCase,$invoiceId);
                $msg="This Case is Sent Kotohali Thana";
            }
            $dbPunish->setCaseStatus($msg,$invoiceId);
        }
        else if($thanaCase==0){
            if($case=="solved"){
                $msg="This Case is Solved";
                $dbPunish->setCaseStatus($msg,$invoiceId);
            }
            else if($case=="pending"){
                $msg="This case is pending";
                $dbPunish->setCaseStatus($msg,$invoiceId);
            }
        }
    }
    $invoiceRes=$dbPunish->getInvoiceList($id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <title>View Users Reports</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
</head>
<body style="font-family: serif; font-size: 16px; background: #000; color: #fff;">
<?php include "nav-admin.php"?>
<div class='container-fluid' align="center">
    <br/>
    <button class="btn btn-primary" style="background: red;width: 500px;font-size: 17px">All Invoice List for User : <?php echo $userName; ?></button>
    <hr style="width: 500px">
    <br>
    <table class='table table-bordered'>
        <tr>
            <th>Police Notice</th>
            <th>1st Reason</th>
            <th>2nd Reason</th>
            <th>3rd Reason</th>
            <th>4th Reason</th>
            <th>5th Reason</th>
            <th>6th Reason</th>
            <th>Date & Time</th>
            <th>Case Status</th>
            <th>User Message</th>
            <th>Select Thana</th>
            <th>Select Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($invoiceRes as $res){?>
            <tr>
                <td><?php echo $res['policeNotice']?></td>
                <td><?php echo $res['reasonOne']?></td>
                <td><?php echo $res['reasonTwo']?></td>
                <td><?php echo $res['reasonThree']?></td>
                <td><?php echo $res['reasonFour']?></td>
                <td><?php echo $res['reasonFive']?></td>
                <td><?php echo $res['reasonSix']?></td>
                <td><?php echo $res['date']?></td>
                <td><?php echo $res['case_status']?></td>
                <td><?php echo $res['userMsg']?></td>
                <form action="" method="post">
                    <input type="hidden" name="invoiceId" value="<?php echo $res['id']?>" />
                    <td>
                        <select class="form-control" name="thanaCase">
                            <option value="0">Choose Thana</option>
                            <option value="1">Pachlaish Thana</option>
                            <option value="2">Chadgao Thana</option>
                            <option value="3">Kotohali Thana</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="case">
                            <option value="nothing">Select Action</option>
                            <option value="solved">Case Solved</option>
                            <option value="pending">Case Pending</option>
                        </select>
                    </td>
                    <td>
                        <button style="background:red;color:white" class="btn btn-danger" type="submit" name="caseAction">Submit</button>
                    </td>
                </form>
            </tr>
        <?php }?>
    </table>
</div>
<br>
<?php include "footer.php"?>
</body>
</html>