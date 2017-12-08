<?php
require_once './config.php';

if (isset($_GET["id"])) {
  $id = intval(base64_decode($_GET["id"]));
 
  $sql = "SELECT * FROM users WHERE id = :id";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (count($result) > 0) {

      if ($result[0]["status"] == "approved") {
        $msg = "Your account has already been activated.";
        $msgType = "info";
      } else {
        $sql = "UPDATE `users` SET  `status` =  'approved' WHERE `id` = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $msg = "Your account has been activated.";
        $msgType = "success";
      }
    } else {
      $msg = "No account found";
      $msgType = "warning";
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}
?>


<?php if ($msg <> "") {
    echo "<script type='text/javascript'>alert('$msg')</script>";
    ?>
<!--  <div class="alert alert-dismissable alert---><?php //echo $msgType; ?><!--">-->
<!--    <button data-dismiss="alert" class="close" type="button">x</button>-->
<!--    <p>-->
<!--    --><?php //echo $msg; ?>
    <!--</p>-->
<!--  </div>-->


<?php }
?>
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container">
  <div class="row">
    <div class="col-md-12">
<!--      <h1>Thank you for registering with us.</h1>-->
        <img src="../pic/activatedAlready.JPG">
        <button name="submit" class="btn btn-info" href="../index.php" style="width: 50%; border-radius: 25px;">BACK</button>
<!--        --><?php
//        echo "<script>setTimeout(\"location.href = '../index.php';\",2000);</script>";
//        ?>
    </div>
  </div>
</div>

<script type="text/javascript">

  function validateForm() {

    var your_name = $.trim($("#uname").val());
    var your_email = $.trim($("#uemail").val());
    var pass1 = $.trim($("#pass1").val());
    var pass2 = $.trim($("#pass2").val());


    // validate name
    if (your_name == "") {
      alert("Enter your name.");
      $("#uname").focus();
      return false;
    } else if (your_name.length < 3) {
      alert("Name must be atleast 3 character.");
      $("#uname").focus();
      return false;
    }

    // validate email
    if (!isValidEmail(your_email)) {
      alert("Enter valid email.");
      $("#uemail").focus();
      return false;
    }

    // validate subject
    if (pass1 == "") {
      alert("Enter password");
      $("#pass1").focus();
      return false;
    } else if (pass1.length < 6) {
      alert("Password must be atleast 6 character.");
      $("#pass1").focus();
      return false;
    }

    if (pass1 != pass2) {
      alert("Password does not matched.");
      $("#pass2").focus();
      return false;
    }

    return true;
  }

  function isValidEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }


</script>

<?php
include './footer.php';
?>