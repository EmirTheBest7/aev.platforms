<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM tl_messages WHERE (incoming_msg_id = '".$row['token_id']."'
                OR outgoing_msg_id = '".$row['token_id']."') AND (outgoing_msg_id = '".$outgoing_id."'
                OR incoming_msg_id = '".$outgoing_id."') ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2); // '".$outgoing_id."'
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['activity'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['token_id']) ? $hid_me = "hide" : $hid_me = "";





        if (!empty($row["user_photo"])) {
            $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"]. ".png";
        } else {
            $user_profile = BASE_URL . "_assets/images/avatar.png";
        }

        $output .= '<div class="chatButton" onclick="window.location.href=\'./?user_id='. $row['token_id'].'\' ">
                        <div class="chatInfo">
                            <div class="image my-image" style="background-image: url('. $user_profile .');"></div>
                            <p class="name">'.$row['nickname'].'</p>
                            <p class="message">'. $you . $msg .'</p>
                        </div>

                        <div class="status onTop">
                            <p class="date">'. $offline .'00:02</p>
                        </div>
                    </div>';
    }
?>