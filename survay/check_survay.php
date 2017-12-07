<?php include 'connect-mysql.php';
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

echo  $userid;
$query = mysqli_query($objCon, $sql);


$strSQL = "SELECT * FROM survay WHERE firstname = '$txtfirstname' and lastname = '$txtlastname' and user_id = '$userid'";
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

if($query){
    $message = $objResult["survay_id"];
    $name = $objResult["firstname"];
    $lastname = $objResult["lastname"];

    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    echo "<script type='text/javascript'>alert('SURVAY ID :' + ' $message ' + ' Firstname ' +' $name'  +' Lastname ' + ' $lastname ')</script>";

    echo '<p><a class="btn btn-outline-success my-2 my-sm-0" href="user_index.php">GO TO SURVAY</a></p>';
    echo '<p><a class="btn btn-outline-success my-2 my-sm-0" href="homepage.php">GO TO SUMMARY</a></p>';

}

else{
    echo "<script type='text/javascript'>alert('submitted failed! Please Try Again')</script>";
    echo "<script>setTimeout(\"location.href = 'user_index.php';\",3000);</script>";
}

mysqli_close($objCon);
?>