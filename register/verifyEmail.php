
<html>
<head>
    <title>Email Verification</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row col-md-12" style="margin-left: 10px; margin-top: 10px">
    <div class="card">
        <img src="../pic/navbarconfirmemail.JPG" style="width: 100%;"><br>
        <h3>Email Confirmation </h3>
        <p> Hey Pornpunnarai, you're almost ready to start enjoying E-cup</p>
        <p>Please click on the link below to verify your email address</p>
        <p>and complete your registration.</p><br>
        <p>
            <a href="'.SITE_URL.'activate.php?id=' . base64_encode($lastID) . '">
                <button class="btn btn-warning" style="color: white;">CLICK TO ACTIVATE YOUR ACCOUNT</button>
            </a><br><br>
            <small>Email send by <span style="color: #fec02d"><b>E-cup Developer</b></span></small>
    </div>
</div>

</body>
<style>
    div.card{
        justify-content: center;
        width: 100%;
        padding: 50px;
        text-align: center;
    }
</style>
</html>
