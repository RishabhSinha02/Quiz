<?php
session_start(); //access to user informations through session variables

$questionno= $_GET['questionno'];
$value1= $_GET['value1'];
$_SESSION["answer"][$questionno]=$value1;



?>