<?php
session_start(); //access to user informations through session variables
// include "Partial/dpconnect.php"; // connection with database
if (!isset($_SESSION['end_time'])) {
    echo "00:00:00";
}
else{
    $timel=gmdate("H:i:s", strtotime($_SESSION['end_time']) - strtotime(date("Y-m-d H:i:s")));
    if (strtotime($_SESSION['end_time'])< strtotime(date("Y-m-d H:i:s"))) {
        echo "00:00:00";
    }
    else{
        echo $timel;
    }
}
?>