<?php
//include("./_inc/functions.php");
include("../functions.php");
header('Content-Type:text/plain');

// Allow/Blocked Config
$blocked = "Disallow: /_inc/" . "\r\n".
"Disallow: /_assets/" . "\r\n".
"Disallow: /home/_api/" . "\r\n".
"Disallow: /home/_uploads/" . "\r\n";

$allowed = "Allow: /" . "\r\n";

$robottxt = $blocked . $allowed ."\r\n";
//


// Displayed
echo "User-agent: *" . "\r\n";
echo $robottxt;


echo "User-agent: " . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
echo $robottxt;

echo "Sitemap: ". $addr ."/sitemap.xml";

?>