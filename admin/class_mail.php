<!-- Code for sending username and password to the users through Email.  -->
<?php

session_start(); //access to user informations through session variables
include "../Partial/dpconnect.php"; // connection with database
include('smtp/PHPMailerAutoload.php');

echo "<h1>Something went wrong ...</h1>";


$class_name = $_POST['eclassname'];
$quiz_subject_id = $_POST['quiz_subject_id'];

$csql = "SELECT * FROM `class` WHERE `class_name` LIKE '$class_name'";
$cresult = mysqli_query($conn, $csql);
$sno = 0;
$crow = mysqli_fetch_assoc($cresult);
$class_id = $crow['class_id'];




$sql = "SELECT * FROM `users` WHERE `class_id` = '$class_id' AND `role` = 2 ORDER BY `class_id` ASC";
$result = mysqli_query($conn, $sql);
$sno = 0;
while($row = mysqli_fetch_assoc($result)){
    $name = $row['username'];
    $username = $row['email'];

    // for creating random password 
    $password_text = "abcdefghijklmnopqrstuvwxyz1234567890!@#$%&";
    $password_text = str_shuffle($password_text);
    $password_text = substr($password_text,0,8);
    $password = $password_text;


    $text = "
    Hello ".$name.",<br><br>
    Following are the details for you to appear Quiz. <br><br>
    Username: ".$username." <br>
    Password: ".$password." <br>
    <br>
    Exam link: http://54.82.240.8/Quiz <br>
    <br>
    Please do not share this password with anyone.  <br> <br> <br>
    This is Auto Generated Email. Please do not reply to this mail. For any Query you can contact to your teacher. <br> <br>
    Thanks, <br>
    Quiz Creator
    ";
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPAuth=true;
    $mail->Username="fs19co057.rishabh.sinha@gmail.com";
    $mail->Password="iniqxwxniffghxpz";
    $mail->SetFrom("fs19co057.rishabh.sinha@gmail.com");
    $mail->addAddress($username);
    $mail->IsHTML(true);
    $mail->Subject="Ready For Quiz";
    $mail->Body=$text;
    $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false,
));
if ($mail->send()) {
    $_SESSION['ClassMailStatus']='Sent';
    $xsql = "UPDATE `users` SET `password` = '$password' WHERE `users`.`email` = '$username'";
    $xresult = mysqli_query($conn, $xsql);

    $ssql = "UPDATE `users` SET `quiz_subject_id` = '$quiz_subject_id' WHERE `users`.`email` = '$username';";
    $sresult = mysqli_query($conn, $ssql);

}
else{
    $_SESSION['ClassMailStatus']='Error';
}



}


// 
header("location: add_class.php");


?>
