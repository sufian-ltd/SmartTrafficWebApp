<?php
session_start();
if(isset($_SESSION['USER_TYPE'])=="admin"){
    unset($_SESSION["thanaId"]);
    unset($_SESSION["thanaName"]);
    header('Location: thana.php');
    exit();
}
?>