<?php
$login= false;       //stores the login status
$showError= false;    // store the errors while filling the form


// checks the valid login 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Partial/dpconnect.php";
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "Select * from users where email='$email'";

    $result = mysqli_query($conn, $sql); 
    $rows = mysqli_fetch_assoc($result);  // Fetching data from Database 

    $username = $rows["username"]; 
    $class_id = $rows["class_id"];         //storing required infos
    $subject = $rows["test"];
    $quiz_subject_id = $rows["quiz_subject_id"];
    $role= $rows["role"];


    $ssql = "SELECT * FROM `quiz_subjects` WHERE `quiz_subject_id` = '$quiz_subject_id'";
    $sresult = mysqli_query($conn, $ssql); 
    $srows = mysqli_fetch_assoc($sresult); 
    $totalquestion = $srows['quiz_total_questions']; 
    $totalmark = $srows['quiz_total_marks']; 
    $exam_time= $srows['quiz_exam_time']; 
    $sid = $srows['sid']; 
    
    //checks the user exit in the database or not
    $num = mysqli_num_rows($result); 
    if ($num == 1 && $password == $rows['password']) {
        $login= true;
        // assigning data to session variables
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['class_id']=$class_id;
        $_SESSION['subject']=$subject;
        $_SESSION['testStatus']=$testStatus;

        $_SESSION['password']=$password;
        $_SESSION['role']=$role;
        $_SESSION['sid']=$sid;
        $_SESSION['totalquestion']=$totalquestion;
        $_SESSION['totalmark']=$totalmark;
        $_SESSION['exam_time']=$exam_time;
        $_SESSION['quiz_subject_id']=$quiz_subject_id;

        header("location: index.php");   // redirect to home page after successfull login.
    }
    else {
        $showError = "Invalid Input";    // Error after unsuccessfull login
    }
}



error_reporting(E_ERROR | E_PARSE);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <!-- <link rel="stylesheet" href="/Quiz/css/home.css"> -->
    <title>Login</title>
</head>

<style>
    * {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    
    html,
    body {
        padding: 0px;
        margin: 0px;
        background-color: #ecf0f1;
    }
    
    #container {
        position: relative;
        display: flex;
        flex-direction: row;
        height: 480px;
        width: 100px;
        /* margin: 60px auto; */

    }
    
    
    #container form {
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex-wrap: wrap;
        text-align: center;
        height: 100%;
        width: 350%;
        left: 0;
        top: 0;
        bottom: 0;
        background-color: #2c3e50;
    }
    
    #container form :first-child {
        font-size: 100px;
        color: #16a085;
        align-items: center;
    }
    
    #container form :nth-child(2) {
        font-size: 24px;
        color: #fff;
    }
    
    #container input {
        border: 0px solid;
        outline-width: 0px;
        width: 300px;
        height: 40px;
        margin-left: 26px;
        font-size: 18px;
        font-weight: 600;
        background-color: #34495e;
        color: #fff;
        padding-left: 10px;
        border-bottom: 2px solid transparent;
        transition: all .3s ease;
    }
    
     ::placeholder {
        font-size: 18px;
        color: #bdc3c7;
    }
    
    #container button {
        border: 0px;
        width: 300px;
        height: 40px;
        margin-left: 26px;
        font-size: 18px;
        font-weight: 600;
        background-color: #16a085;
        color: #fff;
        cursor: pointer;
        transition: all .3s ease;
    }
    /*Hover effect*/
    
    #container button:hover {
        background-color: #ce4f48;
    }
    
    #container input:focus {
        border-bottom: 2px solid #16a085;
    }
    /*Media Query*/
    
    @media screen and (max-width: 1100px) {
        #container {
            height: 480px;
            width: 400px;
        }
        #container form {
            height: 100%;
            width: 100%;
        }
        #container button {
            margin-left: 84px;
        }
        #container input {
            margin-left: 78px;
        }
    }
    /*the same thing but maw width is 800px*/
    
    @media screen and (max-width: 800px) {
        #container {
            height: 480px;
            width: 400px;
        }
        #container img {
            visibility: hidden;
        }
        #container form {
            height: 100%;
            width: 100%;
        }
        #container input {
            margin-left: 78px;
        }
        #container button {
            margin-left: 84px;
        }
    }
</style>




<body>
    <!-- body  -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Quiz/admin/addsubjects.php"><b><font color="#16a085">THE </font><font size="6" color="#5A6EA5"> QUIZ </font></b></a> &nbsp &nbsp
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
            </div>
        </div>
    </nav>




    <!-- alerts -->
<?php
if ($login) {
echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You have logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
';
}
if ($showError) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    

} 
?>






    <!--Login Form -->
    <br>
    <center>
    <div id="container">
        <br>
        <form action="/Quiz/login.php" method="post">
        <i class="fas fa-user-circle"></i>
        <h2>Login</h2>
        <br>
        <br>
                <input type="email" id="email" name="email" aria-describedby="email" placeholder="Email" required>
<br>
                <input type="password" id="password" name="password" placeholder="Password" required>
<br>
                <button type="submit" >Login</button>
        </form>
        <br>
    </div>
    </center>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>