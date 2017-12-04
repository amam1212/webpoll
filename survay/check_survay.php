<?php
    include 'connect-mysql.php';
    session_start();



    if (isset($_POST['checkboxvar']))
    {

        $useremail = $_POST["txtemail"];

        $strSQL = "SELECT * FROM user WHERE email = '$useremail'";
        $objQuery = mysqli_query($objCon, $strSQL);
        $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);


        if(!$objResult)
        {
        $sql ="INSERT INTO user (email) VALUES ('$useremail')";
        $query = mysqli_query($objCon, $sql);
    $factor = implode(',', $_POST['checkboxvar']);

    //var_dump(count($_POST['checkboxvar']));
    //    print_r($_POST['checkboxvar']);

        $arr = $_POST['checkboxvar'];

        mysqli_set_charset($objCon,"utf8");

    //insert to survaysectionone
    $sql ="INSERT INTO result (factorlist) VALUES ('$factor')";
    $query = mysqli_query($objCon, $sql);
    $i=0;

        while($i < count($_POST['checkboxvar'])){
                $answer = $_POST['checkboxvar'][$i];
                $sql = "INSERT INTO vote (result) VALUES ('$answer')";
                $query = mysqli_query($objCon, $sql);
                $i++;
        }
        if($query){
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
            echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
        }
        }
        else{
            echo "<script type='text/javascript'>alert('email has already used!')</script>";
            echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
        }

}


    else{
        echo "<script type='text/javascript'>alert('submitted failed! Please Try Again')</script>";
        echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
    }

    mysqli_close($objCon);
?>