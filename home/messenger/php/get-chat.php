<?php 

    include('../../../_inc/functions.php');
    $conn = connect();
    session_start();
    if(isset($_SESSION['token_id'])){
        $outgoing_id = $_SESSION['token_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM tl_messages LEFT JOIN users ON users.token_id = tl_messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '".$outgoing_id."' AND incoming_msg_id = '".$incoming_id."')
                OR (outgoing_msg_id = '".$incoming_id."' AND incoming_msg_id = '".$outgoing_id."') ORDER BY msg_id";
        $query = mysqli_query($conn, $sql); // '".$outgoing_id."'  '".$incoming_id."'
        
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="msg messageSent">
                                    '. $row['msg'] .'
                                    <span class="timestamp">00:00</span>
                                </div>';

                                /*'<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>'; */

                                
                }else{
                    if (!empty($row["user_photo"])) {
                        $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"]. ".png";
                    } else {
                        $user_profile = BASE_URL . "_assets/images/avatar.png";
                    }
                    $output .=  '<div class="msg messageReceived">
                                    '. $row['msg'] .'
                                    <span class="timestamp">00:00</span>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>