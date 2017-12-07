<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
$objConnect = mysqli_connect("localhost","root","1q2w3e4r",TEST) or die(mysqli_error());
mysqli_query($objConnect,"SET NAMES UTF8");
$strSQL = "SELECT * FROM facebook_users";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="400" border="1">
  <tr>
    <th><div align="center">Facebook ID </div></th>
    <th><div align="center">Picture </div></th>
    <th><div align="center">Name </div></th>
    <th><div align="center">CreateDate </div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["FACEBOOK_ID"];?></div></td>
    <td><a href="<?php echo $objResult["LINK"];?>"> <img src="https://graph.facebook.com/<?php echo $objResult["FACEBOOK_ID"];?>/picture"></a></td>
    <td><?php echo $objResult["NAME"];?></td>
    <td><div align="center"><?php echo $objResult["CREATE_DATE"];?></div></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($objConnect);
?>
</body>
</html>