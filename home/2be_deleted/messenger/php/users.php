<?php

    include('../../../_inc/functions.php');
    $conn = connect();
    
    session_start();
    auth();
    logout();

    $outgoing_id = $_SESSION['token_id'];
    //$sql = "SELECT * FROM users WHERE NOT token_id = '".$outgoing_id."' ORDER BY user_id DESC";

    $sql = "SELECT users.user_id, users.username, users.nickname, users.token_id, users.activity
    FROM users
    JOIN (
        SELECT tl_friendship.user1_id AS user_id
        FROM tl_friendship
        WHERE tl_friendship.user2_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
        UNION
        SELECT tl_friendship.user2_id AS user_id
        FROM tl_friendship
        WHERE tl_friendship.user1_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
    ) userfriends
    ON userfriends.user_id = users.user_id";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>