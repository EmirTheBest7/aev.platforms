<?php

include('../../../_inc/functions.php');
session_start();
include('qrlib.php');


if (isset($_GET['qurl'])) {
    $qr = $_GET['qurl'];
} else {
    // outputs image directly into browser, as PNG stream
    $qr = BASE_URL . "home/auth/?refer=" . strtolower($_SESSION['nickname']);
}

QRcode::png($qr); 

?>