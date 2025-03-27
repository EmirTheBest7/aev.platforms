<style> body {background: black; color: white; font-size: 25px;} </style>
<?php 

if (require './_inc/functions.php') {
    echo "Λ L I Ξ V Platforms | Testing Terminal</br>";
    echo "Kernel functions works properly</br>";
    echo "Local IP Adress: " . getHostByName(getHostName()) . "</br>---</br>";
}

// Test out your code here!
/*
$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === TRUE ? 'http' : 'https';
echo gettype($_SERVER['HTTP_HOST']), "\n" . $_SERVER['HTTP_HOST'];
//echo $_SERVER['SERVER_PROTOCOL'];

if($_SERVER["HTTP_HOST"] === "192.168.0.103" || "localhost" || "127.0.0.1"){
    echo True;
} else {
    echo False;
    //False
}*/

echo random_str(16);



?>