<?php
require_once './config.php';
include '../connect-mysql.php';
if (isset($_GET["id"])) {
    $id = intval(base64_decode($_GET["id"]));
    $strSQL = "SELECT * from users WHERE id = '$id'";
    $objQuery = mysqli_query($objCon, $strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    mysqli_close($objCon);


    $u_time = intval(base64_decode($_GET["time"])); // fetching time variable from URL
    $cur_time = time(); //fetching current time to check with GET variable's time
    if ($cur_time - $u_time < 600) {
        // link is not expired

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
            <link href="/css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom styles for this template -->
            <link href="/css/cover.css" rel="stylesheet">
            <link href="registerstyle.css" rel="stylesheet">

            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        </head>

        <body style="background-color: darkslategray;">

        <header>
            <!--     Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                <a href="../index.php"><i class="fa fa-chevron-left pull-left" aria-hidden="true"></i></a>
                <a class="navbar-brand" href="#">E-CUP</a>

                <!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">-->
                <!--            <span class="navbar-toggler-icon"></span>-->
                <!--        </button>-->

                <!--        <div class="collapse navbar-collapse" id="navbarsExampleDefault">-->
                <!--            <ul class="navbar-nav mr-auto">-->
                <!--            </ul>-->

                <!--            <div class="my-0 my-lg-0">-->
                <!--                        <nav class="nav nav-masthead">-->
                <!--                            <div class="col-md-2">-->
                <!--                                <a href="/ecupweb/login/login.php" class="btn btn-secondary">Login?</a>-->
                <!--                            </div>-->
                <!--                        </nav>-->

                <!--            </div>-->
                <!--        </div>-->
            </nav>
        </header>


        <main role="main" class="container" style="background-color: darkslategray;">
            <div class="panel panel-info" style="margin-top: 70px;">
                <h2>Please Sign Up</h2><br>
                <form class="form-horizontal" method="post" action="check-newpassword.php">
                    <input type="hidden" class="form-control" name="txtEmail" placeholder="Enter your email"
                           required="required" value="<?php echo $objResult["email"] ?>">
                    <br>
                    <?php  echo  $u_time."  ". $cur_time

                    ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"
                                                           aria-hidden="true"></i>&nbsp;New Password</span>
                        <input type="password" class="form-control" id="txtPassword" name="txtPassword"
                               placeholder="Enter your Password"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="Must contain at least one number and one uppercase and lowercase letter,
                       and at least 8 or more characters" required>
                    </div>
                    <div id="message" style="justify-content: flex-start">
                        <br>
                        <p id="length" class="invalid">
                            <small>Password length :8 - 20 characters</small>
                        </p>
                        <p id="letter" class="invalid">
                            <small>Password must be at least have a lowercase letter</small>
                        </p>
                        <p id="capital" class="invalid">
                            <small>Password must be at least have a uppercase letter</small>
                        </p>
                        <p id="number" class="invalid">
                            <small>Password must be at least have 1 number</small>
                        </p>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp; Re-New password</span>
                        <input type="password" class="form-control" id="txtRepassword" name="txtRepassword"
                               placeholder="Enter your Password again"
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               title="This password must be equal to you password" required="required">
                    </div>
                    <div id="checkPassword" style="justify-content: flex-start">
                        <br>
                        <p id="repasswordtext" class="invalid">
                            <small>Password is match</small>
                        </p>
                    </div>

                    <br>
                    <button name="submit" class="btn btn-info" style="width: 50%; border-radius: 25px;">Confirm</button>
                </form>

            </div>


        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted"><p>Created by <b style="color: white">ecup developer</b>.</p></span>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
        <script src="/js/vendor/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
        <script src="registerjavascript.js"></script>
        </body>
        </html>
        <?php
    }else
    {
        echo "link has been expired";
    }
}

?>