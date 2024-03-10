<?php

include('../../../_inc/functions.php');
    $conn = connect();
    
    session_start();

    $outgoing_id = $_SESSION['token_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT token_id = '$outgoing_id' AND (username LIKE '%'$searchTerm'%' OR nickname LIKE '%'$searchTerm'%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>