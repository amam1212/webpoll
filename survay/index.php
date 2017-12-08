<?php session_start();
$_SESSION["Name"];
$pieces = explode(" ", $_SESSION["Name"]);
$firstname = $pieces[0];
$lastname = $pieces[1];


if(!isset($_SESSION["User_ID"])){
    header('location:/osmpoll/');
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Poll</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sticky-footer-navbar.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/modelPic.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>

        <script src="js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
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
                  Hello! <?php echo $_SESSION["Name"] ?>
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                        <a class="btn btn-warning" href="logout.php">logout</a>
                </form>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="mt-3" style="text-align: center">
            <br>
            <h3>เชียงใหม่ในมือของคุณ</h3><hr>
            <p>ตามที่ศูนย์ความเป็นเลิศด้านการศึกษาเรื่องเมืองและนโยบายสาธารณะ มหาวิทยาลัยเชียงใหม่</p>
            <p>ได้รับมอบหมายให้จัดทำแผนพัฒนาพื้นที่ในเขตเมืองของกลุ่มจังหวัดภาคเหนือตอนบน 1 (เชียงใหม่ ลำพูน ลำปาง แม่ฮ่องสอน)</p>
            <p>ทั้งในด้านกายภาพ การจราจร  การอยู่อาศัย และคุณภาพชีวิตที่ดีขึ้น ควบคู่กับการดำรงไว้ซึ่งวัฒนธรรมและเอกลักษณ์ความเป็นเมืองของตนเอง</p>
            <p>ดังนั้นความคิดเห็นของคนในพื้นที่จึงเป็นสิ่งสำคัญต่อการกำหนดแนวทางการพัฒนาเมืองเพื่อประกอบการจัดทําแผนการพัฒนาเมืองเชิงนโยบายสาธารณะ</p><hr>
        </div>

        <form id="contact-form" method="post" action="check_survay.php" role="form">
            <!-- name -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="txtfirstname"><b>ชื่อ <span style="color: red">*</span></b></label>
                    <input type="text" name="txtfirstname" class="form-control" placeholder="กรุณากรอกชื่อ *" value="<?php echo $firstname; ?>" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-md-6">
                    <label for="txtlastname"><b>นามสกุล <span style="color: red">*</span></b></label>
                    <input type="text" name="txtlastname" class="form-control" placeholder="กรุณากรอกนามสกุล *" value="<?php echo $lastname; ?>" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="txtphone"><b>เบอร์โทร <span style="color: red">*</span></b></label>
                    <input type="text" name="txtphone" class="form-control" placeholder="กรุณากรอกเบอร์โทร *"  required="required" data-error="Age is required.">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="col-md-8">
                    <label for="txtemail"><b>อีเมล์ <span style="color: red">*</span></b></label>
                    <input type="email" name="txtemail" placeholder="กรุณากรอกอีเมล์ *" class="form-control" value="<?php echo $_SESSION["Email"]; ?>" required="required" data-error="Email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="txtcommunity"><b>ชุมชน <span style="color: red">*</span></b></label>
                    <input type="text" name="txtcommunity" class="form-control" placeholder="ชุมชน *" required="required" data-error="Number of member is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="txtgoodpoint"><b>จุดเด่นของเมือง <span style="color: red">*</span></b></label>
                    <textarea name="txtgoodpoint" class="form-control" placeholder="จุดเด่นของเมือง *" rows="2" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="txtbadpoint"><b>จุดด้อย/ปัญหาภายในเมือง <span style="color: red">*</span></b></label>
                    <textarea name="txtbadpoint" class="form-control" placeholder="จุดด้อย/ปัญหาภายในเมือง *" rows="2" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="txtactivity"><b>โครงการหรือกิจกรรมที่คิดว่าจะทำให้เกิดการพัฒนา <span style="color: red">*</span></b></label>
                    <textarea name="txtactivity" class="form-control" placeholder="โครงการหรือกิจกรรมที่คิดว่าจะทำให้เกิดการพัฒนา *" rows="3" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="txtfutureinchiangmai"><b>"เชียงใหม่ในอนาคต"จะเป็นอย่างไร(วิสัยทัศน์) <span style="color: red">*</span></b></label>
                    <textarea name="txtfutureinchiangmai" class="form-control" placeholder="'เชียงใหม่ในอนาคต' จะเป็นอย่างไร(วิสัยทัศน์) *" rows="3" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>

            </div>
            <div class="row" style="justify-content: center; padding: 20px; background-color: bisque;border-radius: 30px;">
                    <h4>อัพโหลดรูปกิจกรรม</h4>
                    <div class="col-md-12" style="text-align: center;">
                        <img id="blah" src="../pic/avatar.png" style="width: 30%" alt="your image" />
                    </div><br>
                    <div class="col-md-12" style="text-align: center;">
                        <input type="file" class="btn btn-info btn-sm" style="width: 50%; margin-top: 20px;" name="activitypic" onchange="readURL(this)">
                    </div>
            </div><br>
            <div class="row" style="justify-content:center;">
                <button name="submit" class="btn btn-warning" style="justify-content:center; width: 30%; border-radius: 25px;">Send</button>
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
    </body>
    </html>
