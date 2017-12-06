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
                    Welcome Pornpunnarai Saimoonkham
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                        <a class="btn btn-warning" href="summarypoll.php">logout</a>
                </form>
            </div>
        </nav>
        </div>

    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="mt-3">
            <br>
            <h3 style="text-align: center">แบบสอบถาม</h3>
            <h4 style="text-align: center">โครงการสำรวจพฤติกรรมการเดินทางของประชาชนในกลุ่มภาคเหนือตอนบน 4 จังหวัด</h4>
            <h4 style="text-align: center">(เชียงใหม่ ลำพูน ลำปาง แม่ฮ่อนสอน)</h4><hr>
            <p style="text-align: center">ศูนย์ความเป็นเลิศด้านการศึกษาเรื่องเมืองและนโยบายสาธารณะ มหาวิทยาลัยเชียงใหม่<br>Excellence Center for Urban Planning and Development (ECUP)</p> <hr>
        </div>

        <form id="contact-form" method="post" action="check_survay.php" role="form">
            <input type="hidden" name="mid" value="<?php echo $objResult["mid"];?>">
            <div class="row">
                <div class="col-md-12">
                    <label for="form_areacode"><b>Area Code *</b></label>

                    <select class="form-control" name="areaid" required="required" data-error="Area code is required.">
                        <option value="">Please Select Area</option>
                        <?php
                        $sqlarea = "SELECT * FROM Area ORDER BY areaId ASC";
                        $objQueryArea = mysqli_query($objCon, $sqlarea);
                        while($objResultArea = mysqli_fetch_array($objQueryArea,MYSQLI_ASSOC))
                        {
                            ?>
                            <option value="<?php echo $objResultArea["areaId"];?>">
                                <?php echo $objResultArea["areaId"]." - ".$objResultArea["areaName"];?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br><label><u><b>ส่วนที่ 1 ข้อมูลพื้นฐานของผู้ตอบแบบสอบถาม</b></u></label><br><br>
            <!-- name -->
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="txtfirstname"><b>1.1 ชื่อ *</b></label>
                    <input type="text" name="txtfirstname" class="form-control" placeholder="Please enter your firstname" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-md-6">
                    <label for="txtlastname"><b>1.2 นามสกุล *</b></label>
                    <input type="text" name="txtlastname" class="form-control" placeholder="Please enter your lastname" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="txtage"><b>1.3 อายุ *</b></label>
                    <input type="text" name="txtage" class="form-control" placeholder="Please enter your age" required="required" data-error="Age is required.">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="col-md-4">
                    <label for="txtphone"><b>1.4 เบอร์โทร *</b></label>
                    <input type="tel" name="txtphone" class="form-control" placeholder="Please enter your telephone" minlength="10" maxlength="10" required="required" data-error="Telephone is required.">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="col-md-4">
                    <p><b>1.5 เพศ *</b></p>
                    <label for="gender" class="radio-inline">
                        <input type="radio" name="gender" value="ชาย" required="required"> ชาย
                    </label>
                    <label for="gender" class="radio-inline">
                        <input type="radio" name="gender" value="หญิง"> หญิง
                    </label>
                    <label for="gender" class="radio-inline">
                        <input type="radio" name="gender" value=""> อื่นๆ <input type="text" name="gentertxt"/>
                    </label>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-6">
                    <label for="txtemail"><b>1.6 อีเมล์ *</b></label>
                    <input type="email" name="txtemail" placeholder="Please enter your email" class="form-control" required="required" data-error="Email is required.">
                    <div class="help-block with-errors"></div>
                </div>

                <div class="col-md-6">
                    <label for="txtmember"><b>1.7 จำนวนสมาชิกในครัวเรือน (รวมตัวท่านเอง) *</b></label>
                    <input type="text" name="txtmember" class="form-control" placeholder="Please enter a number of member" required="required" data-error="Number of member is required.">
                    <div class="help-block with-errors"></div>
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label><b>1.8 ระดับการศึกษาของผู้ตอบแบบสอบถาม *</b></label>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name="educationLevel" value="ประถมศึกษา" required="required"> ประถมศึกษา
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name="educationLevel" value="มัธยมศึกษาตอนต้น"> มัธยมศึกษาตอนต้น
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name="educationLevel" value="ปวช"> ปวช.
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name="educationLevel" value="มัธยมศึกษาตอนปลาย"> มัธยมศึกษาตอนปลาย
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name=educationLevel value="ปวส"> ปวส.
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name="educationLevel" value="ปริญญาตรี"> ปริญญาตรี
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name="educationLevel" value="สูงกว่าปริญญาตรี"> สูงกว่าปริญญาตรี
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="educationLevel" class="radio-inline">
                                <input type="radio" name="educationLevel" value=""> อื่นๆ<input type="text" name="educationLeveltxt"/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- occupation -->
            <div class="form-group row">
                <div class="col-md-12">
                    <label><b>1.9 อาชีพหลักของผู้ตอบแบบสอบถาม *</b></label>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="รับราชการ/พนักงานของรัฐ" required="required"> รับราชการ/พนักงานของรัฐ
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="รัฐวิสาหกิจ"> รัฐวิสาหกิจ
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="ธุรกิจส่วนตัว"> ธุรกิจส่วนตัว
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="พนักงานบริษัท"> พนักงานบริษัท
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name=occupation value="นักเรียน/นักศึกษา"> นักเรียน/นักศึกษา
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="รับจ้างทั่วไป"> รับจ้างทั่วไป
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="เกษตรกร"> เกษตรกร
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="แม่บ้าน/พ่อบ้าน/เกษียณ"> แม่บ้าน/พ่อบ้าน/เกษียณ
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value="่างงาน/ไม่ประกอบอาชีพ"> ว่างงาน/ไม่ประกอบอาชีพ
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="occupation" class="radio-inline">
                                <input type="radio" name="occupation" value=""> อื่นๆ<input type="text" name="occupationtxt"/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="parttimetxt"><b>1.10 อาชีพเสริม</b></label>
                    <input type="text" name="parttimetxt" class="form-control" placeholder="Enter your parttime" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="salarytxt"><b>1.11 รายได้(อาชีพเสริม)</b></label>
                    <input type="text" name="salaryparttimetxt" class="form-control" placeholder="Enter your salary">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label><b>1.12 ภูมิลำเนาเดิมของท่าน *</b></label>
                    <div class="row">

                        <div class="col-md-12">
                            <label for="hometown" class="radio-inline">
                                <input type="radio" name="hometown" value="ในพื้นที่(เกิดและเติบโตในพื้นที่)" required="required"> ในพื้นที่(เกิดและเติบโตในพื้นที่)
                            </label>
                        </div>

                        <div class="col-md-12">
                            <label for="hometown" class="radio-inline">
                                <input type="radio" name="hometown" value=""> ย้ายมาจากพื้นที่อื่น  คือพื้นที่ <input type="text" name="hometowntxt"/>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <label for="numberOfLivetxt"><b>1.13 ระยะเวลาที่อยู่ในพื้นที่(ปี) *</b></label>
                    <input type="number" name="numberOfLivetxt" class="form-control" required="required" data-error="Enter a time to live">
                    <div class="help-block with-errors"></div>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-send" value="Send Survay">
                </div>

                <div class="col-md-12">
                    <p class="text-muted">
                        <strong>*</strong> These fields are required.</p>
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
