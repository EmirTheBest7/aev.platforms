<?php

//fetch_user.php


require '../../_inc/functions.php';
session_start();
// Check whether user is logged on or not
auth();
// Establish Database Connection
$conn = connect();


include('database_connection.php');

session_start();


            echo '<center>'; 
            $sql = "SELECT users.user_id, users.username, users.nickname
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
            $width = '168px';
            $height = '168px';
            if($query){
                if(mysqli_num_rows($query) == 0){
                    echo '<div class="post">';
										echo 'You don\'t yet have any friends.';
                    echo '</div>';
                } else {
                    while($row = mysqli_fetch_assoc($query)){

											echo '
											<div class="msg online start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['nickname'].'">
          							<img class="msg-profile" src="https://emiraliev.com/img/InstaProfile.png" alt="" />
          							<div class="msg-detail">
            							<div class="msg-username">'.$row["username"].'</div>
           	 							<div class="msg-content">
													<!--<span class="msg-message">Last Message</span>-->
			  									<span class="msg-message">'.count_unseen_message($row["user_id"], $_SESSION["user_id"], $connect).' '.fetch_is_type_status($row["user_id"], $connect).'</span>
			  									<!--<p>'.$status.'</p>-->
			  									<span class="msg-date" style="list-style-type:none;">@'.$row["nickname"].'</span>
													<!--<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['nickname'].'">Start Chat</button></td>-->
													</div>
												</div>
											</div>';
                    }
                }
            }
            echo '</center>';
        ?>