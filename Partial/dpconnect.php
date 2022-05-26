<?php

//COnecting to Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz";

// Create a connection
$conn = mysqli_connect($servername,$username,$password, $database);
if (!$conn) {
    echo "Error??";
}


?>