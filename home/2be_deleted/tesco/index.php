<?php 

include('../../_inc/functions.php');

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>CodePen - jQuery Scheduler</title>
   <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	

  <link rel='stylesheet' href='https://cdn3.devexpress.com/jslib/17.2.7/css/dx.spa.css'>
<link rel='stylesheet' href='https://cdn3.devexpress.com/jslib/17.2.7/css/dx.common.css'>
<link rel='stylesheet' href='https://cdn3.devexpress.com/jslib/17.2.7/css/dx.dark.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
<link rel="stylesheet" href="<?php echo BASE_URL . "_assets/css/core.css" ?>">
<link rel="stylesheet" href="./style.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>

<script>

var resourcesData = [
    {
        /* 

        if isset($_SESSION[my_id]) -> table_row: background-color: dimgray;
        
        */
        text: "Emir Aliev",
        id: 1,
        color: "orange"
    }, {
        text: "Hester",
        id: 2,
        color: "green"
    },
    {
        text: "Emir2",
        id: 3,
        color: "red"
    },
    {
        text: "Emir4",
        id: 4,
        color: "red"
    }
];


var data = [{
    "text": "M",
    "category": "M",
    "ownerId": 1,
    "startDate": new Date(2021, 11, 12), // Date(2021, 11 - 1, 12)
    "endDate": new Date(2021, 11, 12)
}, {
    "text": "O1",
    "category": "O1",
    "ownerId": 2,
    "startDate": new Date(2021, 11, 18),
    "endDate": new Date(2021, 11, 21)
}, {
    "text": "R1",
    "category": "R1",
    "ownerId": 4,
    "startDate": new Date(2021, 11, 8),
    "endDate": new Date(2021, 11, 10)
}, {
    "text": "R2",
    "category": "R2",
    "ownerId": 3,
    "startDate": new Date(2021, 11, 14),
    "endDate": new Date(2021, 11, 16)
}, {
    "text": "X",
    "category": "X",
    "ownerId": 2,
    "startDate": new Date(2021, 11, 7),
    "endDate": new Date(2021, 11, 11)
}, {
    "text": "Unavailable",
    "category": 2,
    "ownerId": 1,
    "startDate": new Date(2018, 3, 1),
    "endDate": new Date(2018, 3, 3)
},{
    "text": "Unavailable",
    "category": 2,
    "ownerId": 2,
    "startDate": new Date(2018, 3, 10),
    "endDate": new Date(2018, 3,20)
},{
    "text": "Off Work",
    "category": 1,
    "ownerId": 1,
    "startDate": new Date(2018, 3, 5),
    "endDate": new Date(2018, 3, 6)
}];

</script>

</head>
<body>
<!-- partial:index.partial.html -->

<nav class="Navbar">
		<a href="#" id="toggle" class="Toggle Navbar-toggle" data-toggle="collapse"
			data-target="#navbarCollapse"><span></span></a>

		<img class="Navbar-brand u-pullRight Navbar-brand-mobile" href="#link" src="<?php echo LOGO; ?>">

		<div id="navbarCollapse" class="Navbar-menu">

		</div>

		<ul class="Navbar-quickLinks">

		</ul>
	</nav>

  <main id="main">

<!--<input type="text" id="input" placeholder="type whatever" value="#countdown" title="type and press enter" />-->

<div class="dx-viewport demo-container"> 
        <div id="scheduler"></div>
    </div>

</main>


<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
  <script src='https://cdn3.devexpress.com/jslib/17.2.7/js/dx.all.js'></script>

  <script  src="./script.js"></s>
  <script src="<?php echo BASE_URL . "_assets/js/core.js"; ?>"></script>


</body>
</script>