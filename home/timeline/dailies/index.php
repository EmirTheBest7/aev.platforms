<?php
include('../../../_inc/functions.php');

session_start();
auth();
ob_start();
$con = connect();


$dailies_token = $_GET['dailies'];

$sql = "SELECT dailies_id, dailies_token, dailies_owner, dailies_img, dailies_time, users.username, users.nickname, users.token_id, users.user_photo, users.access, users.user_id
        FROM tl_dailies
        JOIN users
        ON tl_dailies.dailies_owner = users.user_id
        WHERE users.user_id = {$_SESSION['user_id']}
        UNION
        SELECT dailies_id, dailies_token, dailies_owner, dailies_img, dailies_time, users.username, users.nickname, users.token_id, users.user_photo, users.access, users.user_id
        FROM tl_dailies
        JOIN users
        ON tl_dailies.dailies_owner = users.user_id
        JOIN (
            SELECT tl_friendship.user1_id AS user_id
            FROM tl_friendship
            WHERE tl_friendship.user2_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
            UNION
            SELECT tl_friendship.user2_id AS user_id
            FROM tl_friendship
            WHERE tl_friendship.user1_id = {$_SESSION['user_id']} AND tl_friendship.friendship_status = 1
        ) userfriends
        ON userfriends.user_id = tl_dailies.dailies_owner"; //ORDER BY post_time DESC

$query = mysqli_query($con, $sql);

if (!$query) {
  echo mysqli_error($con);
}

if (mysqli_num_rows($query) == 0) {
  echo '<div class="post">';
  echo 'There are no dailies yet to show.';
  echo '</div>';
} else {
  while ($row = mysqli_fetch_assoc($query)) {
    (!empty($row["user_photo"])) ? $user_profile = BASE_URL . "home/_uploads/user_".$row["token_id"]. "/profile/" .$row["user_photo"] : $user_profile = BASE_URL . "_assets/images/avatar.png";
      
    //echo $row['dailies_id'];
  }
}

//echo $dailies_token;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dailies</title>

  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <img src="<?php echo LOGO;?>" style="position: fixed;width: 100px;top: 20px;left: 20px;">
  <div class="instagram-stories__page">
    <button class="instagram-stories__btn-prev">
      <i class="fas fa-chevron-left"></i>
    </button>
    <button class="instagram-stories__btn-next">
      <i class="fas fa-chevron-right"></i>
    </button>
    <div class="cub">
      <div class="face face-up"></div>
      <div class="face face-right"></div>
      <div class="face face-down"></div>
      <div class="face face-left"></div>
    </div>
  </div>
</body>
<!-- partial -->
<script>
  const stories = [
    {
      user: {
        name: '{USERNAME}',
        imageURL: 'https://api.adorable.io/avatars/100', // Profile Picture
      },
      images: [
        'https://picsum.photos/id/1/250/450',
        'https://picsum.photos/id/2/250/450',
        'https://picsum.photos/id/3/250/450',
        'https://picsum.photos/id/4/250/450',
        'https://picsum.photos/id/5/250/450',
      ],
    },
    {
      user: {
        name: '{USERNAME}',
        imageURL: 'https://api.adorable.io/avatars/101',
      },
      images: [
        'https://picsum.photos/id/6/250/450',
      ],
    },
  ];
</script>
<script src="./script.js"></script>

</body>

</html>