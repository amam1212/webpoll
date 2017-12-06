<?php include 'connect-mysql.php';
session_start();
$mid = $_POST["mid"];
$areaid = $_POST['areaid'];

//section one
$txtfirstname = $_POST['txtfirstname'];
$txtlastname = $_POST['txtlastname'];
$txtage = $_POST['txtage'];
$txtphone = $_POST['txtphone'];
$gender = $_POST['gender'];
if($gender == ""){
    $gender = $_POST['gentertxt'];
}
$txtemail = $_POST['txtemail'];
$txtmember = $_POST['txtmember'];
$educationLevel = $_POST['educationLevel'];
if($educationLevel == ""){
    $educationLevel = $_POST['educationLeveltxt'];
}
$occupation = $_POST['occupation'];
if($occupation == ""){
    $occupation = $_POST['occupationtxt'];
}
$parttimetxt = $_POST['parttimetxt'];
$salaryparttimetxt = $_POST['salaryparttimetxt'];
$hometown = $_POST['hometown'];

if($hometown == ""){
    $hometown = $_POST['hometowntxt'];
}
$numberOfLivetxt = $_POST['numberOfLivetxt'];

mysqli_set_charset($objCon,"utf8");

//insert to survaysectionone
$sql ="INSERT INTO survay (mid, areaid, firstname,lastname,age,gender,email,phone,message,amountOfFamily,educationLevel,mainOccupation,
    parttime,parttimesalary,amountOftimetoLive,hometown) VALUES ('$mid', '$areaid', '$txtfirstname','$txtlastname','$txtage','$gender','$txtemail',
    '$txtphone','$messagetxt','$txtmember','$educationLevel','$occupation',
    '$parttimetxt','$salaryparttimetxt','$numberOfLivetxt','$hometown')";
$query = mysqli_query($objCon, $sql);


$strSQL = "SELECT * FROM survay WHERE firstname = '$txtfirstname' and lastname = '$txtlastname' and mid = '$mid' and areaid = '$areaid'";
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