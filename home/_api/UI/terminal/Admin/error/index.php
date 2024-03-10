<?php 

include('../../../../../../_inc/functions.php');
include('_error.php');

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>_error</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<main class="bsod container">
  <h1 class="neg title"><span class="bg">Error - <?php echo $code; ?></span></h1>
  <p>An error has occured, to continue:</p>
  <p>* Return to our homepage.<br />
  * Send us an e-mail about this error and try later. <?php response($code); ?></p>
  <nav class="nav">
    <a href="<?php echo BASE_URL; ?>" target="_top" class="link">index</a>&nbsp;|&nbsp;<a href="<?php echo BASE_URL . "home/dashboard/"; ?>" target="_top" class="link">dashboard</a>
  </nav>
</main>
<!-- partial -->
  
</body>
</html>
