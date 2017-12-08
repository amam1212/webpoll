<?php
session_start();
ini_set('display_errors', 1);
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';
include '../connect-mysql.php';
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;


$fb = new Facebook\Facebook([
  'app_id' => '132698370781806',
  'app_secret' => '328cd53d09c42c08225cbd4d526c1485',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  $response = $fb->get('/me?fields=id,name,gender,email,link', $accessToken);

  $user = $response->getGraphUser();

	mysqli_query($objCon,"SET NAMES UTF8");

    $sql = "SELECT * FROM member WHERE email = '".$user['email']."'";
    $objQuery = mysqli_query($objCon,$sql);
    $result = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


	// Check Exists ID
	$strSQL = "SELECT * FROM facebook_users WHERE FACEBOOK_ID = '".$user['id']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
        $Email = $user['email'];

        $sql = "SELECT m.id,f.NAME AS name, m.email,m.type FROM member m INNER JOIN facebook_users f ON m.email = f.EMAIL
        WHERE f.EMAIL = '$Email'";

        mysqli_set_charset($objCon,"utf8");
        $objQuery = mysqli_query($objCon,$sql);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


        $_SESSION["User_ID"] = $objResult["id"];
        $_SESSION["Name"] = $objResult["name"];
        $_SESSION["Email"] = $objResult["email"];
        $_SESSION["Type"] = $objResult["type"];


        echo "<script type='text/javascript'>alert('Login Successful! Welcome to E-cup Website')</script>";
        echo "<script>setTimeout(\"location.href = '/osmpoll/survay';\",2000);</script>";
		exit();
	}
	else if(!$result)
	{
		// Create New ID

			$strPicture = "https://graph.facebook.com/".$user['id']."/picture?type=large";

			$strSQL ="  INSERT INTO  facebook_users (FACEBOOK_ID,NAME,EMAIL,PICTURE,LINK,CREATE_DATE) 
				VALUES
				('".trim($user['id'])."',
				'".trim($user['name'])."',
				'".trim($user['email'])."',
				'".trim($strPicture)."',
				'".trim($user['link'])."',
				'".trim(date("Y-m-d H:i:s"))."')";
			$objQuery  = mysqli_query($objCon,$strSQL);

        $Type = "Facebook";
        $Email = $user['email'];
        $strSQL = "INSERT INTO `member` ( `email`, `type`) VALUES ('$Email','$Type')";

        $objQuery = mysqli_query($objCon, $strSQL);



        $sql = "SELECT m.id,f.NAME AS name, m.email,m.type FROM member m INNER JOIN facebook_users f ON m.email = f.EMAIL
        WHERE f.EMAIL = '$Email'";
        mysqli_set_charset($objCon,"utf8");
        $objQuery = mysqli_query($objCon,$sql);
        $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);


        $_SESSION["User_ID"] = $objResult["id"];
        $_SESSION["Name"] = $objResult["name"];
        $_SESSION["Email"] = $objResult["email"];
        $_SESSION["Type"] = $objResult["type"];



        echo "<script type='text/javascript'>alert('Login Successful! Welcome to E-cup Website')</script>";
        echo "<script>setTimeout(\"location.href = '/osmpoll/survay';\",2000);</script>";
		exit();
	}
    else if($result){

        $msg = "Email already exist by ". $result["type"] ;

        echo "<script type='text/javascript'>alert('$msg')</script>";
        echo "<script>setTimeout(\"location.href = '/osmpoll/index.php';\",2000);</script>";
    }

	mysqli_close($objCon);


}

?>