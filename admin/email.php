<!-- Code for sending username and password to the users through Email.  -->
<?php

session_start(); //access to user informations through session variables
include "../Partial/dpconnect.php"; // connection with database

echo "Something Went Wrong";
$name = $_POST['ename'];
$username = $_POST['eusername'];

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
include('smtp/PHPMailerAutoload.php');
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->Port=587;
$mail->SMTPSecure="tls";
$mail->SMTPAuth=true;
$mail->Username="rishabhsinha.projects@gmail.com";
$mail->Password="ywxwhkvwgtzswmyg";
$mail->SetFrom("rishabhsinha.projects@gmail.com");
$mail->addAddress($username);
$mail->IsHTML(true);
$mail->Subject="Ready For Quiz";
$mail->Body=$text;
$mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false,
));
echo "hello2";

if ($mail->send()) {
    $_SESSION['mailStatus']='Sent';
    $_SESSION['mailName']=$name;
    $sql = "UPDATE `users` SET `password` = '$password' WHERE `users`.`email` = '$username'";
    $result = mysqli_query($conn, $sql);


}
else{
    $_SESSION['mailStatus']='Error';
}

echo "hello3";
header("location: addstudent.php");


?>
