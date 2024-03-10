<!DOCTYPE html>
<html>

<?php 
    
    function ageCalculator($dob){
        if(!empty($dob)){
            $birthdate = new DateTime($dob);
            $today   = new DateTime('today');
            $age = $birthdate->diff($today)->y;
            return $age;
        }else{
            return 0;
        }
    }
    $dob = '2000-10-17';
    //echo ageCalculator($dob);
    
    
    
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="main.js"></script>
</head>

<body>
    



    <?php

    $employer = $_REQUEST['employer'];
    $address = $_REQUEST['address'];
    // __init__ variables

    if ($_REQUEST['for_whom'] == "") {
        $for_whom = "Vážená paní, Vážený pane";
    } else {
        $for_whom = $_REQUEST['for_whom'];
        // Nezapomen pridat proemnou pred carku aby jsi tam tu carku mel
    }

    $job = $_REQUEST['job'];
    $server = $_REQUEST['server'];
    

    if ($_REQUEST['school'] == "") {
        $school = "Integrované střední školy technické a ekonomické Sokolov";
    } else {
        $school = $_REQUEST['school'];
    }

    $because = $_REQUEST['because'];
    $iam = $_REQUEST['iam'];
    $lang = $_REQUEST['inlineRadioOptions'];

    echo "<div class='card' id='myInput'>
            <div class='card-header'>
            <a class='btn btn-primary' href='index.php'>Back</a>
            Motivační dopis 
            <button class='btn btn-primary' onclick='myFunction()'>Copy text</button>
            </div>
            <div contentEditable='true' id='a' onclick='copyDivToClipboard()'>";
            if ($lang == "cz") {
                include("resume_cz.php");
            } else if ($lang == "eng") {
                echo "Hello";
            } else if ($lang == "rus") {
                echo "Привет";
            }
    echo "</div>";



    
    
        
        
        
    ?>

<!--
    <script>
        function copyDivToClipboard() {
            var range = document.createRange();
            range.selectNode(document.getElementById("a"));
            window.getSelection().removeAllRanges(); // clear current selection
            window.getSelection().addRange(range); // to select text
            document.execCommand("copy");
        }
    </script>-->
</body>

</html>