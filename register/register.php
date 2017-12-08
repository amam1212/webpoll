<?php
require_once './config.php';
include '../connect-mysql.php';
session_start();


if (isset($_POST["txtFirstname"])) {
    require_once "phpmailer/class.phpmailer.php";

    $FirstName = trim($_POST['txtFirstname']);
    $LastName = trim($_POST['txtLastname']);
    $Telephone = trim($_POST['txtTel']);
    $Email = trim($_POST['txtEmail']);
    $Password = trim($_POST['txtPassword']);
    $RePassword = trim($_POST['txtRepassword']);
    $Picture = trim($_POST['pic']);
    $Type = "Register";

    if($Password != $RePassword)
    {
        echo "<script type='text/javascript'>alert('Password not Match!')</script>";
        echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
        exit();
    }

    $sql = "SELECT * FROM member WHERE email = '$Email'";
    $objQuery = mysqli_query($objCon,$sql);
    $result = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    try {

        if ($result) {
            $msg = "Email already exist by ". $result["type"] ;
            $msgType = "warning";
            echo "<script type='text/javascript'>alert('$msg')</script>";
            echo "<script>setTimeout(\"location.href = 'index.php';\",2000);</script>";
            //echo $msg;
        } else {
            $sql = "INSERT INTO users ( firstname, lastname, password, email, telephone, picture)
            VALUES " . "( :fname, :lname, :pass, :email, :tel, :pic)";
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":fname", $FirstName);
            $stmt->bindValue(":lname", $LastName);
            $stmt->bindValue(":pass", md5($Password));
            $stmt->bindValue(":email", $Email);
            $stmt->bindValue(":tel", $Telephone);
            $stmt->bindValue(":pic", $Picture);
            $stmt->execute();
            $result = $stmt->rowCount();

            $strSQL = "INSERT INTO member (email, `type`) VALUES ('$Email','$Type')";
            $objQuery = mysqli_query($objCon,$strSQL);

            echo "<script type='text/javascript'>alert('You Register Successful!')</script>";
            echo "<script>setTimeout(\"location.href = '../index.php';\",2000);</script>";

            mysqli_close($objCon);

            if ($result > 0) {
                $lastID = $DB->lastInsertId();
                $message = '<html><head>
                <title>Email Verification</title>
                </head>
                <body>';
                $message .= '<h1>Hi ' . $name . '!</h1>';
                $message .= '<p><a href="'.SITE_URL.'activate.php?id=' . base64_encode($lastID) . '">CLICK TO ACTIVATE YOUR ACCOUNT</a>';
                $message .= "</body></html>";

                // php mailer code starts
                $mail = new PHPMailer(true);
                $mail->IsSMTP(); // telling the class to use SMTP

                $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
                $mail->SMTPAuth = true;                  // enable SMTP authentication
                $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
                $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                $mail->Port = 465;                   // set the SMTP port for the GMAIL server

                $mail->Username = 'ecup.spp@gmail.com';
                $mail->Password = 'spp123456';

                $mail->SetFrom('ecup.spp@gmail.com', 'ecup');
                $mail->AddAddress($Email);

                $mail->Subject = trim("Email Verifcation - www.thesoftwareguy.in");
                $mail->MsgHTML($message);

                try {
                    $mail->send();
                    $msg = "An email has been sent for verfication.";
                    $msgType = "success";
                } catch (Exception $ex) {
                    $msg = $ex->getMessage();
                    $msgType = "warning";
                }
            } else {
                $msg = "Failed to create User";
                $msgType = "warning";
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
 ?>


<script type="text/javascript">
  function validateForm() {

    var your_name = $.trim($("#uname").val());
    var your_email = $.trim($("#uemail").val());
    var pass1 = $.trim($("#pass1").val());
    var pass2 = $.trim($("#pass2").val());


    // validate name
    if (your_name == "") {
      alert("Enter your name.");
      $("#uname").focus();
      return false;
    } else if (your_name.length < 3) {
      alert("Name must be atleast 3 character.");
      $("#uname").focus();
      return false;
    }

    // validate email
    if (!isValidEmail(your_email)) {
      alert("Enter valid email.");
      $("#uemail").focus();
      return false;
    }

    // validate subject
    if (pass1 == "") {
      alert("Enter password");
      $("#pass1").focus();
      return false;
    } else if (pass1.length < 6) {
      alert("Password must be atleast 6 character.");
      $("#pass1").focus();
      return false;
    }

    if (pass1 != pass2) {
      alert("Password does not matched.");
      $("#pass2").focus();
      return false;
    }

    return true;
  }

  function isValidEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
</script>
