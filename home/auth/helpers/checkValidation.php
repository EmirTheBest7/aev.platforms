<?php 
include('../../../_inc/functions.php');

$con = connect();
session_start();

// Check if nickname || email is available
if(isset($_POST["nick_name"])) {
    $nickname = mysqli_real_escape_string($con, $_POST["nick_name"]);
    $x_result = mysqli_query($con, "SELECT * FROM users WHERE nickname = '".$nickname."'");
    if (mysqli_num_rows($x_result) > 0 && $nickname != $_SESSION['nickname']) {
        echo mysqli_num_rows($x_result);
    } else {
        echo '0';
    }
}
if(isset($_POST["mail_check"])) {
    $mail = mysqli_real_escape_string($con, $_POST["mail_check"]);
    $y_result = mysqli_query($con, "SELECT * FROM users WHERE email = '".$mail."'");
    if (mysqli_num_rows($y_result) > 0 && $mail != $_SESSION['email']) {
        echo mysqli_num_rows($y_result);
    } else {
        echo '0';
    }
}

?>