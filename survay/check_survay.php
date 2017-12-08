<?php include '../connect-mysql.php';
session_start();
$userid = $_SESSION["User_ID"];

//section one
$txtfirstname = $_POST['txtfirstname'];
$txtlastname = $_POST['txtlastname'];
$txtphone = $_POST['txtphone'];
$txtemail = $_POST['txtemail'];
$txtcommunity = $_POST['txtcommunity'];

$txtgoodpoint = $_POST['txtgoodpoint'];
$txtbadpoint = $_POST['txtbadpoint'];
$txtactivity = $_POST['txtactivity'];
$txtfutureinchiangmai = $_POST['txtfutureinchiangmai'];

mysqli_set_charset($objCon,"utf8");

//insert to survaysectionone

$sql ="INSERT INTO survay (user_id, firstname, lastname,phone,email,community,badpoint,goodpoint,activity,futureinchiangmai) 
VALUES ('$userid', '$txtfirstname', '$txtlastname','$txtphone',
    '$txtemail','$txtcommunity','$txtgoodpoint','$txtbadpoint','$txtactivity', '$txtfutureinchiangmai')";
$query = mysqli_query($objCon, $sql);


if($query){


    echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
}
else{
    echo "<script type='text/javascript'>alert('submitted failed! Please Try Again')</script>";

}
echo "<script>setTimeout(\"location.href = 'index.php';\",3000);</script>";
mysqli_close($objCon);
?>