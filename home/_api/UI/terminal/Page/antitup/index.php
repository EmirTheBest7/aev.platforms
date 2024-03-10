<?php include('../../../../../../_inc/functions.php');

session_start();
auth();
adminOnly();


echo $isAdmin;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
  <title>Plan MD - Anitup</title>

  <link rel='stylesheet' href='https://unpkg.com/augmented-ui@2.0.0/augmented-ui.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.35.0/codemirror.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.1/addon/scroll/simplescrollbars.min.css'>


  <link rel="stylesheet" href="./style.css">
</head>

<body data-augmented-ui>
  <div class="content code highcontrast-dark augs bg">
    <textarea id="code"><?php echo (isset($isAdmin) && $isAdmin == true) ? file_get_contents("plan.md") : "Access granted"; ?></textarea>
    <p style="position: absolute;right: 5px;top: 5px;">//  One More thing...</p>
  </div>

  <!-- partial -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.1/codemirror.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.1/mode/javascript/javascript.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.1/mode/css/css.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.1/addon/scroll/simplescrollbars.min.js'></script>

  <script  src="./script.js"></script>

</body>

</html>