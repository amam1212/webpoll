<?php
session_start();

	$objConnect = mysqli_connect("localhost","root","1q2w3e4r","pollosm") or die(mysqli_error());

    mysqli_set_charset($objCon,"utf8");


	// Check Exists ID
	$strSQL = "SELECT * FROM tb_facebook WHERE FACEBOOK_ID = '".$_SESSION["strFacebookID"]."' ";
	$objQuery = mysqli_query($objConnect,$strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
	if($objResult)
	{
		echo "Welcome to my Account<br><br>";
		echo "Facebook ID = ".$objResult["FACEBOOK_ID"];
		echo "<br><a href='".$objResult["LINK"]."' target='_blank'>
		<img src='".$objResult["PICTURE"]."' border='0'></a><br><br>";
		echo $objResult["NAME"];
	}
	
	echo "<br><br><br><a href='logout.php'>Logout</a>";
	mysqli_close();
?>