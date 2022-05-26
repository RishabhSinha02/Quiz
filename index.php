<?php
session_start(); //access to user informations through session variables
include "Partial/dpconnect.php"; // connection with database

// $sql = "Select * from users where role=1";
// $result = mysqli_query($conn, $sql); 
// $rows = mysqli_fetch_assoc($result); 
// $admin_pass = $rows['password'];

// $email = $_SESSION['email'];
// $ssql = "UPDATE `users` SET `password` = '$admin_pass' WHERE `users`.`email` = '$email'";
// $sresult = mysqli_query($conn, $ssql)

error_reporting(E_ERROR | E_PARSE);
?>
<?php $subject= $_SESSION['subject']; ?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/Quiz/css/home.css"> -->
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Control Panel</title>
</head>


<style>
body {
    background-color: rgb(209, 203, 255);
}

.main {
    padding: 15px;
    font-family: Arial, Helvetica, sans-serif;
}


.sidebar a {
    margin-left: 10px;
    display: block;
    color: white;
    padding-bottom: 10px;
    font-size: 30px;
    text-decoration: none;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;

}

.content {
    background-color: whitesmoke;
}





table {
    position: relative;
    /* left: 50%; */
    top: 50%;
    /* transform: translate(-50%, -50%); */
    border-collapse: collapse;
    width: 1200px;
    /* height: 200px; */
    border: 1px solid #bdc3c7;
    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}

tr {
    transition: all .2s ease-in;
    cursor: pointer;
}

th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

#header {
    background-color: #16a085;
    color: #fff;
}

#title {
    background-color: #5A6EA5;
    color: #fff;
}

h1 {
    font-weight: 600;
    text-align: center;
    background-color: #16a085;
    color: #fff;
    padding: 10px 0px;
}

tr:hover {
    background-color: #f5f5f5;
    transform: scale(1.02);
    box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}

@media only screen and (max-width: 768px) {
    table {
        width: 90%;
    }
}
</style>



<body>
    <!-- body  -->




    <?php
// Not loginned index page 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: login.php");
}   // Checks login  false
  
    





/////////// FOR ADMIN //////////

if ($_SESSION['role']==1) {
    header("location: admin/addsubjects.php");
}

?>




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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Quiz/admin/adminpanel.php"><b><button
                                    type="button" class="btn btn-dark">Students</button></b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addquiz.php"><button type="button"
                                class="btn btn-dark">Quiz</button></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addsubjects.php"><button type="button"
                                class="btn btn-dark">Subjects</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addquestions.php"><button type="button"
                                class="btn btn-success">Question Bank</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/result.php"><button type="button"
                                class="btn btn-dark">Results</button></a>
                    </li> -->



                </ul>



                <form action="/Quiz/logout.php" class="d-flex">
                    <button class="btn btn-outline-warning" type="submit"><i data-feather="log-out"></i>
                        <font size="2"><b> Logout</b></font>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!--Sidebar Profile  -->
    <div class="main">
        <div class="row">
            <!--  -->
            <!--  -->
            <!--  -->
            

            <!-- Rest bar  -->

            <div class="col-md-16 mt-1">

                <div class="card mb-3 content">
                    <!-- Body -->






                    <div class="card text-center">
                        <div class="card-header bg-secondary text-white">
                            Welcome! <?php echo $_SESSION['username'];  ?>
                        </div>
                        <div class="card-body bg-light">
                            <h4>:: General Instructions ::</h4>
                            <ol align="left">
                                <li>You are allowed to start the test whenever you want to. The timer would start only
                                    when you start the test. However remember that admin has full rights to disable the
                                    test at any time. So it is recommended to start the test at the prescribed time.
                                </li>
                                <li>To start the test, click on 'Enter Exam'.</li>
                                <li>You need a good internet connection and device for exam. </li>
                                <li>After login, you will not able to login again. </li>
                                <li>Once test start, you can't re-attempt the test.</li>
                                <li>Test will be automatically submited, after the given test time gets over.</li>
                                <li>Result will be displayed after test.</li>
                            </ol>
                            <hr>
                            <h4 align="left"><b> Exam Details:</b></h4>

                            <h5 class="card-title"><?php echo "<b>".$_SESSION['subject'];  ?>  | <?php echo $_SESSION['totalmark']." marks" ?> </b> -- <?php 
                    
                            if ($_SESSION['exam_time']<999) {
                                echo $_SESSION['exam_time']." mins";
                            }
                            else {
                                echo "No Time Limit";
                            }
                             
                            
                            ?></h5>
                            <p class="card-text">Questions will be of MCQ types. You have to finished the exam within
                                the given time. Click below to Start.
                            </p>

                                    <input type="button" value="Enter Exam" class="btn btn-success" onclick="set_exam_type_session('<?php echo $subject ?>');">
                                    <?php
                                
                            ?>
                            
                        </div>
                        <div class="card-footer bg-secondary text-white">
                            All the Best !!! 
                        </div>
                    </div>

  









                </div>

            </div>
        </div>
    </div>



   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
    feather.replace()
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
         function set_exam_type_session(exam_subject)
         {
            var xmlhttp = new  XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    window.location="quiz.php";
                };
            };
            xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_subject="+exam_subject,true);  
            xmlhttp.send(null);
         }
    </script>
</body>

</html>