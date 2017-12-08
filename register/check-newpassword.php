<?php
require_once './config.php';
include '../connect-mysql.php';



if (isset($_POST["txtEmail"])) {
    $Email = $_POST["txtEmail"];
    $newpassword = md5($_POST["txtPassword"]);
            $sql = "UPDATE `users` SET `password`='$newpassword' WHERE `email` = '$Email'";
            $objQuery = mysqli_query($objCon, $sql);
            mysqli_close($objCon);
}




?>