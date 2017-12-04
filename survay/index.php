<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Poll</title>

        <!-- Bootstrap core CSS -->
        <link href="/questionare/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="/questionare/css/sticky-footer-navbar.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/modelPic.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>

        <script src="/questionare/js/vendor/popper.min.js"></script>
        <script src="/questionare/js/bootstrap.min.js"></script>
    </head>

    <body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                    <a class="btn btn-outline-success my-3 my-sm-0" href="summarypoll.php">Summary Poll</a>
                </form>
            </div>
        </nav>
        </div>

    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="mt-3">
            <br>
            <h3 style="text-align: center">โพล</h3>
            <hr>
            <p style="text-align: center">ศูนย์ความเป็นเลิศด้านการศึกษาเรื่องเมืองและนโยบายสาธารณะ มหาวิทยาลัยเชียงใหม่<br>Excellence Center for Urban Planning and Development (ECUP)</p> <hr>
        </div>

        <form id="contact-form" method="post" action="check_survay.php" role="form">
            <div class="form-group row">
                <div class="col-md-12">
                    <input type="email" name="txtemail" class="form-control" placeholder="Please enter your email" required="required" data-error="Email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <hr>
            <br>
            <div class="form-group row">

                <?php
                include 'connect-mysql.php';
                $query = "SELECT * FROM factor";
                $sql = mysqli_query($objCon,$query);
                $result = array();
                mysqli_set_charset($objCon,"utf8");
                while ($row_user = mysqli_fetch_assoc($sql)){
                    $result[] = $row_user;

                }
//                while ($objResult = mysqli_fetch_array($results, MYSQLI_ASSOC)){
//
//                    $arr = array($objResult["factorid"]);
//
//                    }
                ?>
                <?php
                foreach ($result as &$value) {
                    ?>
                <div class="col-md-4">
                    <div class="card">
                        <h4 style="margin-top:10px ;"><?php echo $value["factorid"]; ?></h4>
                        <img id="<?php echo $value["factorpic"]?>" src="img/<?php echo $value["factorpic"]?>.jpg" alt="<?php echo $value["factorname"]; ?>" style="width:100%">

                        <p style="margin-top:10px ;"><?php echo $value["factorname"]; ?></p>
                        <p style="background-color: black; color: white; height: 40px;"><input style="color: white; margin-top: 10px;" name='checkboxvar[]' type="checkbox" value=<?php echo $value["factorid"]?>> VOTE</p>
                    </div>
                    <br>
                </div>
                    <div id="myModal" class="modal">

                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
                    <script>
                        // Get the modal
                        var modal = document.getElementById('myModal');

                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                        var img = document.getElementById(<?php echo $value["factorpic"]?>);
                        var modalImg = document.getElementById("img01");
                        var captionText = document.getElementById("caption");
                        img.onclick = function(){
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            captionText.innerHTML = this.alt;
                        }

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                            modal.style.display = "none";
                        }
                    </script>

                <?php

                }
                ?>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12" style="text-align: center" >
                    <input type="submit" class="btn btn-success btn-send" value="Send Poll">
                </div>
        </form>
    </main>

    <br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">
                Copyright (c) 2017, OSM Poll
            </span>
        </div>
    </footer>

    <script>
        $(document).ready(function () {
            $("input[name='checkboxvar[]']").change(function () {
                var maxAllowed = 10;
                var cnt = $("input[name='checkboxvar[]']:checked").length;
                if (cnt > maxAllowed) {
                    $(this).prop("checked", "");
                    alert('You can select maximum ' + maxAllowed + ' technologies!!');
                }
            });
        });
    </script>
    </body>
    </html>
