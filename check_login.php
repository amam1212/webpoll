<?php
session_start();
include '../db/connect-mysql.php';

$strSQL = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($objCon,$_POST['txtEmail'])."' 
	and password = '".mysqli_real_escape_string($objCon,md5($_POST['txtPassword']))."'";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
{
    echo "Username and Password Incorrect!";
}
else
{
    $_SESSION["UserID"] = $objResult["id"];
    $_SESSION["Status"] = $objResult["status"];

    session_write_close();

    if($objResult["status"] == "approved")
    {
//        header("location:admin_page.php");
        echo "Pass";
    }
    else
    {
//        header("location:user_page.php");
        echo "fail";
    }
}
mysqli_close($objCon);
?>