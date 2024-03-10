<?php

//Global Variables



$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
$addr = 'https://' . $_SERVER['HTTP_HOST']; // Returns http://192.168.0.103 but crashing the navbar

if($_SERVER["HTTP_HOST"]== "192.168.0.103" || "localhost" || "127.0.0.1"){
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'u494733746_admin';
    $DATABASE_PASS = 'LJXS3YJVYfM0';
    $DATABASE_NAME = 'u494733746_main';
    error_reporting(0);
    ini_set('display_errors', 0);
}else{
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'u494733746_admin';
    $DATABASE_PASS = 'LJXS3YJVYfM0';
    $DATABASE_NAME = 'u494733746_main';
    error_reporting(0);
    ini_set('display_errors', 0);
}

define("ROOT_PATH", realpath(dirname(__FILE__)));
define("BASE_URL", $addr . "/");
define("LOGO", BASE_URL . "page/downloads/logo/ALIEV.svg"); //ALIEV2.svg
define("LOGO_IO", BASE_URL . "page/downloads/logo/ALIEV3.svg");

define("HEADER", BASE_URL . "_assets/modules/header/"); //home/timeline/header.php

/* // Works as of PHP 7 
define('ANIMALS', array('dog','cat','bird'));
echo ANIMALS[1]; */


// Connection to Database
function connect() {
    static $conn;

    global $DATABASE_HOST;
    global $DATABASE_USER;
    global $DATABASE_PASS;
    global $DATABASE_NAME;

    if ($conn === NULL){ 
        $conn = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
    }

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    return $conn;
}

function adminOnly(){
    // Admin Only Access
    $token_arr = array(
        // user_id => token_id
        1 => 'AbdCmkXqvPpScpQ4',
        2 => 'FnvnzFSUCT7lvc5E');
    $isAdmin = false;
    global $isAdmin;
    
    foreach ($token_arr as $key => $value) {
        if ($key == $_SESSION['user_id'] && $value == $_SESSION['token_id'] && $_SESSION["access"] == 2 ) {
            $isAdmin = true;
        }
    } return $isAdmin;
    
    if (!$isAdmin) {
        header("Location:" . BASE_URL . "home/auth/");
        exit();
    }

}

// Verified markup
function verified($access) {
    /*// Hex Access Codes 
        //Private 1x
            - #1x2705 = AEV Developer (cube_ico)
        //Allocated 0x
            - #0x2705 = Verified
            - #0x2705 = Family (umrella)
            - #0x2705 = Friend (brightness-plus)
        // Public Available 2x
            - #0x2705 = Musician
            - #0x2705 = Crypto Maniac

            
    */

    if (isset($access)) {
        
        switch ($access) {
            /* Allocated */
            case 1: //Verified
                $verified = '&nbsp;<i class="uil uil-check-circle"></i>';
                break;
            case 2: //Developer
                $verified = '&nbsp;<i class="uil uil-cube"></i>';
                break;
            case 3: //Premium
                $verified = '&nbsp;<i class="uil uil-favorite"></i>';
                break;
            case 3: //Family
                $verified = '&nbsp;<i class="uil uil-umbrella"></i>';
                break;
            case 4: //Friend
                $verified = '&nbsp;<i class="uil uil-brightness-plus"></i>';
                break;

            /* Public */
            case 4: //Musician
                $verified = '&nbsp;<i class="uil uil-music-note"></i>';
                break;
            case 3: //Crypto
                $verified = '&nbsp;<i class="uil uil-bitcoin"></i>';
                break;
            default: break;
        }
        return $verified;
    }
}


function auth() {
    if(!isset($_SESSION["token_id"])){
        header("Location:" . BASE_URL . "home/auth/");
        exit(); 
    }/*else {
        //Setup New Profile 
        if(isset($_SESSION["new_user"]) && basename(dirname(parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH))) != "editProfile"){ // || "setup"
            header("Location:" . BASE_URL . "home/studio/editProfile");
        }

        //Activity Log
        ((abs(strtotime($endtimestamp) - strtotime($starttimestamp))/3600) > 2) ? '' : '';
    }*/
}

function logout() {
    // Not Tested
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        if(session_destroy()) {
            header("Location:" . BASE_URL . "home/auth/");
            exit(); 
        }
    }
    
}

function notify($text) {
    $token = "2117013421:AAFUAr-9BAt16uQtfz_OGqvZb1R17XZda9A";
    $chat_id = "2130023332";

    $data = [
        'text' => $text,
        'chat_id' => $chat_id,
    ];
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
    //echo "https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data);
}

function create_qr($qr) {
    echo BASE_URL . "home/wallet/lib/?qurl=$qr";
}

function file_get_module($file) { // Get PHP Content 
    echo eval("?>".file_get_contents($file));
}


function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}



?>