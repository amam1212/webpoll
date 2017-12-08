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
//

//            function alphanumeric_rand($num_require = 8)
//            {
//                $randomstring = null;
//                $alphanumeric = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
//                if ($num_require > sizeof($alphanumeric)) {
//                    echo "Error alphanumeric_rand(\$num_require) : \$num_require must less than " . sizeof($alphanumeric) . ", $num_require given";
//                    return;
//                }
//                $rand_key = array_rand($alphanumeric, $num_require);
//                for ($i = 0; $i < sizeof($rand_key); $i++) $randomstring .= $alphanumeric[$rand_key[$i]];
//                return $randomstring;
//            }
//
//            $resetpass = md5(alphanumeric_rand(12));
//            $sql = "UPDATE `users` SET `password`='$resetpass' WHERE `email` = '$Email'
//";
//            $objQuery = mysqli_query($objCon, $sql);
//            echo $sql;
//
            $strSQL = "SELECT * from users WHERE email = '$Email'";
            $objQuery = mysqli_query($objCon, $strSQL);
            $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
            mysqli_close($objCon);


            $lastID = $objResult["id"];

            $message = '<html><head>
                <title>Reset Password</title>
                </head>
                <body>';
            $message .= '<h1>Hi ' . $name . '!</h1>';
            $time = time();
            $message .= '<p><a href="' . SITE_URL . 'newpassword.php?id=' . base64_encode($lastID).'&time=' .base64_encode($time). '">Reset Password</a>';
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

