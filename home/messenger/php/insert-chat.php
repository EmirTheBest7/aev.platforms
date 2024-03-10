<?php 
    include('../../../_inc/functions.php');
    $conn = connect();
    session_start();
    if(isset($_SESSION['token_id'])){
        $outgoing_id = $_SESSION['token_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO tl_messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ('$incoming_id', '$outgoing_id', '$message')") or die();
                                       
        }
    }else{
        header("location: ../login.php");  //'".$outgoing_id."'  '".$incoming_id."'
    }


    
?>