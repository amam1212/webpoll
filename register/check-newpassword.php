<?php
require_once './config.php';
include '../connect-mysql.php';



if (isset($_POST["txtEmail"])) {
    $Email = $_POST["txtEmail"];
    $newpassword = md5($_POST["txtPassword"]);
            $sql = "UPDATE `users` SET `password`='$newpassword' WHERE `email` = '$Email'";
            $objQuery = mysqli_query($objCon, $sql);

    echo "<script type='text/javascript'>alert('Your Password has Changed!')</script>";



}
echo "<script>setTimeout(\"location.href = '../index.php';\",2000);</script>";

mysqli_close($objCon);
?>