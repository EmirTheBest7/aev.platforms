<?php

$jsondata = file_get_contents("./conf.json", true);

$array = json_decode($jsondata,true);

echo json_encode($array, JSON_PRETTY_PRINT);

//header('Content-Type: application/json');


echo "<p id='demo'></p>"

?>

<script>
         
const myObj = JSON.parse(json_encode($array, JSON_PRETTY_PRINT));

document.getElementById("demo").innerHTML = myObj.settings;

</script>