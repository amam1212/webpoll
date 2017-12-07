<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-cup Website</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/cover.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">

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

                </div>
            </div>
        </nav>

        <div class="cover-container">
            <div class="row containnerbody">


            <div class="container panel panel-info">
            <main role="main" class="container-fluid">
                <div class="panel panel-info">
                    <h2>Please Sign Up</h2><br>
                    <form class="form-horizontal" method="post" action="register.php">
                        <div class="row col-md-12" style="justify-content: center">
                            <div class="col-md-12">
                                <img id="blah" src="../pic/avatar.png" style="width: 30%" alt="your image" />
                            </div>
                            <div class="row"></div>
                            <div class="col-md-12">
                                <input type="file" class="btn btn-info btn-sm" name="pic" onchange="readURL(this)">
                            </div>
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Firstname</span>
                            <input type="text" class="form-control" name="txtFirstname" placeholder="Enter your First Name" required="required">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Lastname</span>
                            <input type="text" class="form-control" name="txtLastname" placeholder="Enter your Last Name" required="required">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Telephone</span>
                            <input type="tel" class="form-control" name="txtTel" placeholder="Enter your Telephone" minlength="10" maxlength="10" required="required">
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Email</span>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Enter your email" required="required">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i>&nbsp; Password</span>
                            <input type="password" class="form-control" name="txtPassword" placeholder="Enter your Password" required="required">
                        </div>

                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp; Re-password</span>
                            <input type="password" class="form-control" name="txtRepassword" placeholder="Enter your Password" required="required">
                        </div>
                        <br>
                        <button name="submit" class="btn btn-info" style="width: 50%; border-radius: 25px;">Sign Up</button>
                    </form>
                </div>
            </main>
        </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <span class="text-muted"><p>Created by <b style="color: white">ecup developer</b>.</p></span>
                </div>
            </footer>
        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
