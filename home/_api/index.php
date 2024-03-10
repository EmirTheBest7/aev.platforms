<?php

include('../../_inc/functions.php');

$con = connect();

session_start();


# Redirect
$urlParams = explode('/', $_SERVER['REQUEST_URI']);
if (empty($urlParams[5])) {header("Location: ./UI/");}

header("Content-Type:application/json");

/*

RewriteEngine On    # Turn on the rewriting engine

RewriteRule ^api/([0-9a-zA-Z_-]*)$ api.php?token_id=$1 [NC,L]
http://localhost/rest/api/15478959

http://192.168.0.103/CV4/home/_api/?token_id=AbdCmkXqvPpScpQ4
*/


#$urlParams = explode('/', $_SERVER['REQUEST_URI']);
unset($urlParams[0], $urlParams[1], $urlParams[2], $urlParams[3], $urlParams[4]);
// unset URL/CV4/home/_api/index.php/
$urlParams = array_values($urlParams);

$functionName = $urlParams[0]; // Called Function as [0]
$functionName($urlParams);


// FIO BANK TRANSCATIONS _GET JSON 
// https://www.fio.cz/ib_api/rest/periods/bbdQ5uW6wgxnOz7WrhZLEoyQkeZ7HTx92Ic2rWeeywcuwUaRT7eKNEKgzGMGWwHm/2021-01-25/2021-06-10/transactions.json
// Popis v PDFku na strankach fio




function func1 ($urlParams) {
	response("Hello");
}

function func2 ($urlParams) {
    //echo "In func2";
    //echo "<br/>Argument 1 -> ".$urlParams[6];
	//echo "<br/>Argument 2 -> ".$urlParams[7];

}


function getInfo ($urlParams) {

	response(

	BASE_URL, LOGO,
	BASE_URL."CSS",
	BASE_URL."JS",
	$_SERVER['REMOTE_ADDR']

	);
}

function login ($urlParams) {
	global $con;

	$urlParams = explode(':', $urlParams[1]);
	//echo "Username: ". $urlParams[0]. "\r\n" ;
	//echo "Password: ". $urlParams[1];

	if (isset($urlParams[0]) && $urlParams[1]!="") {

		$login = mysqli_real_escape_string($con,$urlParams[0]);
		$pass = mysqli_real_escape_string($con,$urlParams[1]);

		$result = mysqli_query($con,"SELECT * FROM users WHERE nickname='".$login."' and password='".md5($pass)."' ");
	
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_array($result);

			$_SESSION['user_id'] = $row["user_id"];
			$_SESSION['token_id'] = $row["token_id"];
			$_SESSION['username'] = $row['username'];
			$_SESSION['nickname'] = $row['nickname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['access'] = $row['access'];
			$_SESSION['bio'] = $row['bio'];

			/*
			//if (!empty($row['bank']) && ($row[]) ) {
				$api_tokens = array(
					// user_id => token_id
					"mydomain.com" => 'AbdCmkXqvPpScpQ4', // ? misto tokenu nebo 'bank' var_symbol?
					"testdomain.com" => 'FnvnzFSUCT7lvc5E'
				);

				if (true) { // $row['access'] == variabilni symbol ( int(len(6)) )

				}
				check api_token && token_id
				check variabilni symbol
			 check bank paid
			}
			*/

			response("Success!!",$row["user_id"], $row["token_id"], $row['username'], $row['nickname'], $row['email'],
			$row['access'], $row['bio']);
			mysqli_close($con);
		} else {
			response(NULL, NULL, 200,"No Record Found");
		}
	} else {
		response(NULL, NULL, 400,"Invalid Request");
	}
	//http://192.168.0.103/CV4/home/_api/index.php/login/{Nickname}:{Password}
}

function getUpdates($urlParams) {
	if (isset($_SESSION['token_id'])) {
		response("getUpdates");
	} else {
		response("User login failed");
	}
	
}

//http://domain.com/url.php/func1
//http://domain.com/url.php/func2/arg1/arg2


/*
if (isset($_GET['token_id']) && $_GET['token_id']!="") {
	$token_id = $_GET['token_id'];
	$result = mysqli_query($con,"SELECT * FROM users WHERE token_id='".$token_id."' ");
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_array($result);
		$username = $row['username'];
		$nickname = $row['nickname'];
		$email = $row['email'];
		
		response($token_id, $username, $nickname,$email);
		mysqli_close($con);
	} else {
		response(NULL, NULL, 200,"No Record Found");
	}
} else {
	response(NULL, NULL, 400,"Invalid Request");
}
*/


/*
function response($token_id,$username,$nickname,$email){
	$response['token_id'] = $token_id;
	$response['username'] = $username;
	$response['nickname'] = $nickname;
	$response['email'] = $email;
	
	$json_response = json_encode($response);
	echo $json_response;
}*/
function response(...$arguments){

	$json_response = json_encode($arguments);
	echo $json_response;
}

?>