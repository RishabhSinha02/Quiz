<?php
session_start(); //access to user informations through session variables
include "../Partial/dpconnect.php"; // connection with database
$exam_subject= $_SESSION['subject'];

$sql = "Select * from quiz_subjects where quiz_subject='$exam_subject'";

$result = mysqli_query($conn, $sql); 
while ($rows = mysqli_fetch_assoc($result)) {
    $_SESSION['exam_time']= $rows['quiz_exam_time'];
}

$date = date("Y-m-d H:i:s");

$_SESSION['end_time']= date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION['exam_start'] = "yes";
?> 