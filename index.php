<?php
session_start();
if(isset($_SESSION["User_ID"])){
    header('location:survay');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-cup Website</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<header>
<!--     Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                <a class="navbar-brand" href="#">E-CUP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <div class="my-0 my-lg-0">
<!--                        <nav class="nav nav-masthead">-->
<!--                            <div class="col-md-2">-->
<!--                                <a href="/ecupweb/login/login.php" class="btn btn-secondary">Login?</a>-->
<!--                            </div>-->
<!--                        </nav>-->

                    </div>
                </div>
            </nav>
</header>


<main role="main" class="container">
    <h1 class="cover-heading">Welcome</h1>
    <p class="lead">
<hr>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Please Sign In</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" action="check_login.php">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Email</span>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Enter your email" required="required">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Password</span>
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Enter your Password"
                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                   title="Must contain at least one number and one uppercase and lowercase letter,and at least 8 or more characters"
                                   required>
                        </div>

                        <div class="spacing">
                            <a href="#">
                                <small> Forgot Password?</small>
                            </a><br/>
                        </div>
                        <div class="spacing">
                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            <small> Remember me</small>
                        </div><br/>
                        <button name="submit" class="btn btn-warning" style="width: 30%; border-radius: 25px;">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-5">
                    <hr>
                </div>
                <div class="col-md-2">
                    OR
                </div>
                <div class="col-md-5">
                    <hr>
                </div>
            </div>
            <div class="row panel-info">
                <div class="col-md-4">
                    <a href="/osmpoll/facebook-login-api" class="btn"><img src="pic/loginwithfacebook.png" style="width: 100%;"></a>
                </div>
                <div class="col-md-4">
                    <a href="/osmpoll/google-login-api" class="btn"><img src="pic/loginwithgoogle.png" style="width: 100%;"></a>
                </div>
                <div class="col-md-4">
                    <a href="/osmpoll/register" class="btn btn-group-sm btn-secondary" style="width: 92%; margin-top: 4%;">Register By Email</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
</main>

<footer class="footer">
    <div class="container">
            <span class="text-muted">
                <p>Created by <b style="color: white">ecup developer</b>.</p>
            </span>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/vendor/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
