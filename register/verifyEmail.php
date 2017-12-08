<html>
<head>
    <title>Email Verification</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row col-md-12" style="margin-left: 10px; margin-top: 10px">
    <div class="card" style="justify-content: center;width: 100%;padding: 50px;text-align: center;">
        <img src="../pic/forgetpw.JPG" style="width: 100%; justify-content: center"><br>
        <h3>Forgot your password?</h3>
        <hr><h4>Pornpunnarai<p><hr>
        <p>Please click on the link below to change your password</p>
        <p>
            <a href="'.SITE_URL.'activate.php?id=' . base64_encode($lastID) . '">
                <button type="button" style="background-color:#bdd7ee; color: white;">Reset Your Password</button>
            </a><br><br>
            <small>Email send by <span style="color: #bdd7ee"><b>E-cup Developer</b></span></small>
    </div>
</div>

</body>
</html>

<!--<html>-->
<!--<head>-->
<!--    <title>Email Verification</title>-->
<!--    <link href="/css/bootstrap.min.css" rel="stylesheet">-->
<!--</head>-->
<!--<body>-->
<!--<div class="row col-md-12" style="margin-left: 10px; margin-top: 10px">-->
<!--    <div class="card" style="justify-content: center;width: 100%;padding: 50px;text-align: center;">-->
<!--        <img src="../pic/navbarconfirmemail.JPG" style="width: 100%; justify-content: center"><br>-->
<!--        <h3>Email Confirmation </h3>-->
<!--        <p> Hey Pornpunnarai, you're almost ready to start enjoying E-cup</p>-->
<!--        <p>Please click on the link below to verify your email address</p>-->
<!--        <p>and complete your registration.</p><br>-->
<!--        <p>-->
<!--            <a href="'.SITE_URL.'activate.php?id=' . base64_encode($lastID) . '">-->
<!--                <button type="button" style="background-color:#fec02d; color: white;">CLICK TO ACTIVATE YOUR ACCOUNT</button>-->
<!--            </a><br><br>-->
<!--            <small>Email send by <span style="color: #fec02d"><b>E-cup Developer</b></span></small>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->

<!--<html>-->
<!--<head>-->
<!--    <link href="/css/bootstrap.min.css" rel="stylesheet">-->
<!--</head>-->
<!--<body>-->
<!--<div class="row col-md-12" style="margin-left: 10px; margin-top: 10px">-->
<!--    <div class="card" style="justify-content: center;width: 100%;padding: 50px;text-align: center;">-->
<!--        <div class="row" style="justify-content: center">-->
<!--            <img src="../pic/activatedAlready.JPG" style="width: 100%; justify-content: center"><br>-->
<!--        </div>-->
<!--        <div class="row" style="justify-content: center">-->
<!--            <a href="../index.php" class="btn btn-info" style="width: 50%; border-radius: 25px;">Go To Login!</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->