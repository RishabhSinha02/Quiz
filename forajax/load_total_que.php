<?php
session_start(); //access to user informations through session variables
include "../Partial/dpconnect.php"; // connection with database

$total_que = 0;
$quiz_subject_id = $_SESSION['quiz_subject_id'];
$zsql = "SELECT * FROM `quiz_questions` where `quiz_questions`.`quiz_subject_id` = '$quiz_subject_id'";
$zresult = mysqli_query($conn, $zsql);
$total_que = mysqli_num_rows($zresult);
echo $total_que;
?>
