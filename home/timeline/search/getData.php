<?php 
// Include configuration file 
require '../../../_inc/functions.php';
require_once 'config.php'; 

// Include User class 
require_once 'User.class.php'; 
 
// Initialize User class 
$user = new User(); 
 
// Define filters 
$conditions = array(); 
 
// If search request is submitted 
if(!empty($_POST['keywords'])){ 
    $conditions['search'] = array('username' => $_POST['keywords'], 'nickname' => $_POST['keywords'], 'email' => $_POST['keywords']); 
} 
 
// If filter request is submitted 
if(!empty($_POST['filter'])){ 
    $sortVal = $_POST['filter']; 
    $sortArr = array( 
        'new' => array( 
            'order_by' => 'created DESC' 
        ), 
        'asc'=>array( 
            'order_by'=>'name ASC' 
        ), 
        'desc'=>array( 
            'order_by'=>'name DESC' 
        )
    );   
    $sortKey = key($sortArr[$sortVal]); 
    $conditions[$sortKey] = $sortArr[$sortVal][$sortKey]; 
} 
 
// Get members data based on search and filter 
$members = $user->getRows($conditions); 
 
if(!empty($members)){ 
    $i = 0; 
    foreach($members as $row){ $i++; 
        echo '<tr><td>
                <a href="'. BASE_URL . "home/profile/?nickname=". strtolower($row['nickname']) .'">
                    <div class="conversation-area">
                        <div class="msg">
                        <img class="msg-profile" src="'.BASE_URL . '_assets/images/avatar.png'. '" alt="">
                            <div class="msg-detail">
                                <div class="msg-username">'.$row['username'].'</div>
                                <div class="msg-content">
                                    <span class="msg-message">@'.$row['nickname'].'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </td></tr>';
    } 
}else{ 
    echo '<tr><td colspan="7">No members(s) found...</td></tr>'; 
} 
exit;