<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
$objConnect = mysqli_connect("localhost","root","","test") or die(mysqli_error());
mysqli_query($objConnect,"SET NAMES UTF8");
$strSQL = "SELECT * FROM google_users";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="400" border="1">
  <tr>
    <th><div align="center">Google ID </div></th>
    <th><div align="center">google_picture_link </div></th>
    <th><div align="center">google_email</div></th>
  </tr>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["google_id"];?></div></td>
    <td><a href="<?php echo $objResult["LINK"];?>"> <img src="<?php echo $objResult["google_picture_link"];?>"></a></td>
    <td><?php echo $objResult["google_email"];?></td>
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