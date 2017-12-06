<?php
session_start();
include 'connect-mysql.php';

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
    $_SESSION["User_ID"] = $objResult["id"];
    $_SESSION["Name"] = $objResult["firstname"]." ".$objResult["lastname"];
    $_SESSION["Email"] = $objResult["email"];
    $_SESSION["Type"] = "Register";

    session_write_close();

    if($objResult["status"] == "approved")
    {
//        header("location:admin_page.php");
        echo "Pass";
    }
    else
    {
        header("location:/osmpoll/survay");
//        echo "fail";
    }
}
mysqli_close($objCon);
?>