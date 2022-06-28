<?php
session_start(); //access to user informations through session variables
include "../Partial/dpconnect.php"; // connection with database
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: /Quiz/login.php");
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
    <!-- <link rel="stylesheet" href="/Quiz/css/home.css"> -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
    height: 200%;
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

if (isset($_GET['StudentResults'])) {
    $class_id = $_GET['StudentResults'];
    $sql = "SELECT * FROM `class` WHERE `class_id` = '$class_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $class_name = $row['class_name'];
    $_SESSION['class_id']=$class_id;
    $_SESSION['class_name']=$class_name;
}

$class_id=$_SESSION['class_id'];


$class_name=$_SESSION['class_name'];


?>

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <form action="/Quiz/admin/result.php">
                <button class="btn btn-outline-warning" type="submit"><i data-feather="arrow-left"></i>
                    <b>Back</b>
                </button>
            </form>
            <div class=""><b>
                    <font size="6" color="white"> <?php echo "&nbsp &nbsp &nbsp ".$class_name." &nbsp &nbsp &nbsp"; ?>
                    </font>
                </b></div>
            <a class="navbar-brand" href="/Quiz/admin/add_class.php"><b>
                    <font color="#16a085">THE </font>
                    <font size="6" color="#5A6EA5"> QUIZ </font>
                </b></a>


        </div>
    </nav>












    <!--Sidebar Profile  -->
    <div class="main">
        <div class="row">

            <!-- Users  -->
            <div class="col-md-12 mt-1">
                <div class="card mb-3 content">
                    <div class="card-body">
                        <center>
                            <br>
                            <table style="border-radius: 20px 20px 0 0; overflow: hidden; ">
                        <tr id="title" class="bg-secondary">
                            <th>
                                <h2>&nbsp Result</h2>
                            </th>
                        </tr>
                    </table>
                    




                        <table id="mytable">
                            <thead>
                                <tr id="header">
                                    <th scope="col" width="10%">
                                        <center>SR. No.</center>
                                    </th>
                                    <th scope="col" width="20%">Student Name</th>
                                    <th scope="col" width="40%">Email</th>
                                    <th scope="col" width="20%">Subject</th>
                                    <th scope="col" width="10%">Result</th>
                                    <th scope="col" width="10%">View</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
              $sql = "SELECT * FROM `results` WHERE `class_id` = '$class_id'";
              $result = mysqli_query($conn, $sql);
              $sno = 0;
              while($row = mysqli_fetch_assoc($result)){
                  $sno+=1;
                  echo "<tr>
                  <th scope='row'><center>$sno</center></th>
                  <td>" . $row['student_name'] . "</td>
                  <td>" . $row['email'] . "</td>
                  <td>" . $row['subject'] . "</td>
                  <td>" . 
                  $row['subject_marks']/$row['total_question']*$row['correct_answer']."/"
                  
                  . $row['subject_marks']."</td>
                  <td><button class='view btn btn-sm btn-primary'  type='submit'>View</button>
                  <input type='hidden' id='quiz_subject_id_for_result' value='" . $row['quiz_subject_id'] ."'>
              </tr>";
              }

          ?>

                            </tbody>
            </table>










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



        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

<!-- Modal for view Result  -->
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="viewModalLabel">View Result</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="user_detail">


                    </div>
                </div>
            </div>
        </div>

        <script>
        views = document.getElementsByClassName("view");
        Array.from(views).forEach((element) => {
            element.addEventListener("click", (e) => {
                tr = e.target.parentNode.parentNode;
                var email = tr.getElementsByTagName("td")[1].innerText;
                console.log(email);
                var qsid = tr.getElementsByTagName("input")[0].value;
                console.log(qsid);

                $.ajax({
                    url: "load_result.php",
                    method: "POST",
                    data: {
                        email: email,
                        qsid: qsid,
                    },
                    success: function(data) {
                        $("#user_detail").html(data);
                        var myModal = new bootstrap.Modal(document.getElementById(
                            "viewModal"), {
                            keyboard: false
                        })
                        myModal.toggle()

                    }
                })
            })
        })
        </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script>
        feather.replace()
        </script>

</body>

</html>