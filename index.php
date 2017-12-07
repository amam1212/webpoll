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
                        <div class="col-md-12" style="justify-content: center">
                            <input name="txtEmail" type="email" placeholder="Enter your email" class="form-control input-md" required autofocus>
                        </div><br/>
                        <div class="col-md-12" style="justify-content: center">
                            <input name="txtPassword" type="password" placeholder="Enter your Password" class="form-control input-md">
                        </div>
                        <div class="spacing">
                            <a href="#">
                                <small> Forgot Password?</small>
                            </a><br/>
                        </div>
                        <div class="spacing">
                            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                            <small> Remember me</small>
                        </div>
                        <button name="submit" class="btn btn-dark pull-right">Sign In</button>
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
                    <a href="#" class="btn"><img src="pic/loginwithfacebook.png" style="width: 100%;"></a>
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
