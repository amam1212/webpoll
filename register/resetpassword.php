<?php
require_once './config.php';
include '../connect-mysql.php';
session_start();


if (isset($_POST["txtEmail"])) {
    require_once "phpmailer/class.phpmailer.php";


    $Email = trim($_POST['txtEmail']);


//    $sql = "SELECT COUNT(*) AS count from member where email = :email_id";

    $sql = "SELECT * from member WHERE email = '$Email'";
    $objQuery = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

    try {

        if ($result["type"] == "Register") {
            $strSQL = "SELECT * from users WHERE email = '$Email'";
            $objQuery = mysqli_query($objCon, $strSQL);
            $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
            mysqli_close($objCon);
            $lastID = $objResult["id"];
            $name = $objResult["firstname"].$objResult["lastname"];

            $message = '<html><head>
                <title>Reset Password</title>
                <link href="/css/bootstrap.min.css" rel="stylesheet">
                </head>
                <body>
                <div class="row col-md-12" style="margin-left: 10px; margin-top: 10px">
                <div class="card" style="justify-content: center;width: 100%;padding: 50px;text-align: center;">';

            $message .= '<img src="../pic/forgetpw.JPG" style="width: 100%;"><br>';
            $message .= '<h3>Forgot your password?</h3>';
            $message .= '<hr><h4 style="color:#80d5ee;">' . $name . '</h4><hr>';
            $time = time();
            $message .= '<h3>Please click on the link below to change your password</h3>';
            $message .= '<p><a href="' . SITE_URL . 'newpassword.php?id=' . base64_encode($lastID).'&time=' .base64_encode($time). '">
            <button type="button" style="background-color:#80d5ee; color: white;border: none;padding: 15px 32px;
            font-size: 16px; margin: 4px 2px;  cursor: pointer;">Reset Your Password</button>              
            </a><br><br>';
            $message .= '<small>Email send by <span style="color: #80d5ee"><b>E-cup Developer</b></span></small>';
            $message .= "</div>
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

            $mail->Subject = trim("Reset Password");
            $mail->MsgHTML($message);

            try {
                $mail->send();
                $msg = "An email has been sent for reset password.";
                $msgType = "success";
            } catch (Exception $ex) {
                $msg = $ex->getMessage();
                $msgType = "warning";
            }
        } else if ($result["type"] != "Register"&&$result!=null) {
            $msg = "Email already exist by " . $result["type"];
            echo $msg;
            var_dump($result);
        } else if ($result == null) {
            $msg = "there are no this email in the system";
            echo $msg;
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

 ?>

