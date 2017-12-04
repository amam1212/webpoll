<?php session_start();
    include 'connect-mysql.php';

    mysqli_set_charset($objCon,"utf8");

    $query = "SELECT * FROM result";
    $sql = mysqli_query($objCon,$query);


    $result = array();
    while ($row_user = mysqli_fetch_assoc($sql)){
        $result[] = $row_user;
    }


    foreach ($result as &$value){
        echo $value["factorlist"];
    }

    $pieces = explode(",", $value["factorlist"]);
    echo "sss";
    echo $pieces[0]; // piece1
    echo "sss";
    echo $pieces[1]; // piece2

?>

    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Questionare</title>

        <!-- Bootstrap core CSS -->
        <link href="/questionare/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sticky-footer-navbar.css" rel="stylesheet">
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
                    <a class="btn btn-outline-success my-2 my-sm-0" href="index.php">HOME</a>

                </form>
            </div>
        </nav>
        </div>

    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="mt-3">
            <br>
            <h3 style="text-align: center">สรุปผลโพล</h3>
        </div>
        <hr>

        <br>

        <table class="table table-striped">
            <thead>
            <tr>
                <th width="10%">Factor Id</th>
                <th width="30%">Factor Name </th>
                <th width="40%">Picture</th>
                <th width="20%">Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php

//            SELECT f.factorid, count(v.result) from factor f
//            left join vote v on f.factorid = v.result GROUP by f.factorid, v.result
//            order by count(v.result) DESC

            $strSQL = "SELECT f.factorid, f.factorname, count(v.result) as a from factor f
left join vote v on f.factorid = v.result GROUP by f.factorid, v.result
order by count(v.result) DESC, f.factorid";
            //echo $strSQL;
            $objQuery  = mysqli_query($objCon, $strSQL);
            while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
            { ?>

                <tr>
                    <td ><?php echo $objResult["factorid"];?></td>
                    <td ><?php echo $objResult["factorname"];?></td>
                    <td > <img id="myImg" src="img/<?php echo $objResult["factorid"]?>.jpg" style="width:50%">
                    </td>
                    <td><?php echo $objResult["a"];?></td>
            <?php

            }



            ?>

            </tbody>
        </table>

    </main>

    <br>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">
                Copyright (c) 2017, Urban Questionare
            </span>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/questionare/js/vendor/popper.min.js"></script>
    <script src="/questionare/js/bootstrap.min.js"></script>
    </body>
    </html>

<?php
mysqli_close($objCon);
?>