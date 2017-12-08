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
                <link href="/css/bootstrap.min.css" rel="stylesheet">
                </head>
                <body>
                <div class="row col-md-12" style="margin-left: 10px; margin-top: 10px">
                <div class="card" style="justify-content: center;width: 100%;padding: 50px;text-align: center;">';

                $time = time();

                $message .= '<img src="../pic/navbarconfirmemail.JPG" style="width: 100%;"><br>';
                $message .= '<h3>Email Confirmation </h3>';
                $message .= '<h1>Hey ' . $FirstName .' ,</h1>';
                $message .= '<p>you\'re almost ready to start enjoying E-cup</p>';
                $message .= '<p>Please click on the link below to verify your email address</p>';
                $message .= '<p>and complete your registration.</p><br>';
                $message .= '<p><a href="'.SITE_URL.'activate.php?id=' . base64_encode($lastID) . '&time=' .base64_encode($time).'">
                                <button type="button" 
                                style="background-color:#fec02d; color: white;border: none;padding: 15px 32px;
                                font-size: 16px; margin: 4px 2px;  cursor: pointer;"> CLICK TO ACTIVATE YOUR ACCOUNT</button>
                                </a><br><br>';
                $message .= '<small>Email send by <span style="color: #fec02d"><b>E-cup Developer</b></span></small>';

                $message .= "    </div>
                            </div>
                            </body>
                            </html>";

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

                $mail->Subject = trim("Email Verifcation");
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
