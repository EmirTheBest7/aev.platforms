<?php 
require '../../_inc/functions.php';
$conn = connect();
session_start();
auth();
ob_start();

adminOnly();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Friend Requests</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
	<link rel="stylesheet" href="./style.css">

	<style>
		main {
			position: relative;
		}

		canvas {
			position: fixed!important;
		}
    </style>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js" integrity="sha512-p7Ey2nBhKYEi9yh0iDs+GMA0ttebOqVl3OO2oWRzRxtDoN/RedyYcHFUJZhMVi8NKRdEA7n+9NTNQX/kFIZgNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!-- For Edit / rewrite main page to edit mode after clicking on EDIT button-->
	<!-- RESET_CMD =  UPDATE tl_friendship SET `friendship_status` = 0  -->

</head>
<body>
    <div class="container">
        <h1>Friend Requests</h1>
        <?php
        // Responding to Request
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['accept'])) {
                $sql = "UPDATE tl_friendship
                        SET tl_friendship.friendship_status = 1
                        WHERE tl_friendship.user1_id = {$_GET['id']} AND tl_friendship.user2_id = {$_SESSION['user_id']}";
                $query = mysqli_query($conn, $sql);
                if($query){
                    echo '<div class="userquery">';
                    echo 'You have accepted ' . $_GET['name'];
                    echo '<br><br>';
                    echo 'Redirecting in 5 seconds';
                    echo '<br><br>';
                    echo '</div>';
                    echo '<br>';
                    header("refresh:5; url=requests.php" );
                }
                else{
                    echo mysqli_error($conn);
                }
            } else if(isset($_GET['ignore'])) {
                $sql6 = "DELETE FROM tl_friendship
                        WHERE tl_friendship.user1_id = {$_GET['id']} AND tl_friendship.user2_id = {$_SESSION['user_id']}";
                $query6 = mysqli_query($conn, $sql6);
                if($query){
                    echo '<div class="userquery">';
                    echo 'You have Ignored ' . $_GET['name'];
                    echo '<br><br>';
                    echo 'Redirecting in 5 seconds';
                    echo '<br><br>';
                    echo '</div>';
                    echo '<br>';
                    header("refresh:5; url=requests.php" );
                }
            }
        }
        // 
        ?>
        <?php
        
        $sql = "SELECT users.user_id, users.username, users.nickname
                FROM users
                JOIN tl_friendship
                ON tl_friendship.user2_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 0 AND tl_friendship.user1_id = users.user_id";
        $query = mysqli_query($conn, $sql); 
        echo "Hello";
        if(!$query)
            echo mysqli_error($conn);
        if($query){
            if(mysqli_num_rows($query) == 0){
                echo '<div class="userquery">';
                echo 'You have no pending friend requests.';
                echo '<br><br>';
                echo '</div>';
            }
            while($row = mysqli_fetch_assoc($query)){
                echo '<div class="userquery">';
                echo '<br>';
                echo '<a class="profilelink" href="index.php?nickname=' . $row['nickname'] .'">' . $row['username'] . '<a>';
                echo '<form method="get" action="requests.php">';
                echo '<input type="hidden" name="id" value="' . $row['user_id'] . '">';
                echo '<input type="hidden" name="name" value="' . $row['username'] . '">';
                echo '<input type="submit" value="Accept" name="accept">';
                echo '<br><br>';
                echo '<input type="submit" value="Ignore" name="ignore">';
                echo '<br><br>';
                echo'</form>';
                echo '</div>';
                echo '<br>';
            }
        }
        ?>
    </div>
</body>
</html>