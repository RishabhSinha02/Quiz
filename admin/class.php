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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
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

if (isset($_GET['view'])) {
    $class_id = $_GET['view'];
    $sql = "SELECT * FROM `class` WHERE `class_id` = '$class_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $class_name = $row['class_name'];
    $_SESSION['class_id']=$class_id;
    $_SESSION['class_name']=$class_name;
}

$class_id=$_SESSION['class_id'];


$class_name=$_SESSION['class_name'];






// Editing Users 
if (isset($_POST['ueusername'])) { 
    $username = $_POST['ueusername'];
    $email = $_POST['ueemail'];
    $quiz_subject_id = $_POST['uetest'];
    
    $isql = "SELECT * FROM `quiz_subjects` WHERE `quiz_subject_id` = '$quiz_subject_id'";
    $iresult = mysqli_query($conn, $isql);
    $irow = mysqli_fetch_assoc($iresult);
    $test = $irow['quiz_subject'];

    $vsql = "UPDATE `users` SET `username` = '$username', `email` = '$email ', `test` = '$test ', `quiz_subject_id` = '$quiz_subject_id ' WHERE `users`.`email` = '$email ';";
    $result = mysqli_query($conn, $vsql);

    echo '
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> User has been edited for : <b><strong><u>'.$username.'</strong></b></u>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
';


}





//  Deleteing the Users
if(isset($_GET['udelete'])){
    $sno = $_GET['udelete'];

    $vsql = "SELECT * FROM `users` where `users`.`sno` = '$sno'";
    $vresult = mysqli_query($conn, $vsql);
    $vrow = mysqli_fetch_assoc($vresult);
    $deleteuser = $vrow['username'];

      $sql = "DELETE FROM `users` WHERE `users`.`sno` = '$sno'";
      $result = mysqli_query($conn, $sql);
      echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Student has been deleted for: <b><u><strong>'.$deleteuser.'</strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    
    }

?>



    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <form action="/Quiz/admin/add_class.php">
                    <button class="btn btn-outline-warning" type="submit"><i data-feather="arrow-left"></i>
                        
                    </button>
                </form>
                <div class=""><b><font size="6" color="white"> <?php echo "&nbsp &nbsp &nbsp ".$class_name." &nbsp &nbsp &nbsp"; ?> </font></b></div>
            <a class="navbar-brand" href="/Quiz/admin/add_class.php"><b><font color="#16a085">THE </font><font size="6" color="#5A6EA5"> QUIZ </font></b></a>
                
                
            </div>
    </nav>





    <!--For editing user info -->
    <div class="modal fade" id="ueedit" tabindex="-1" aria-labelledby="ueeditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="ueditLabel">Edit</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <!-- Subject Modal form  -->
                    <form action="/Quiz/admin/class.php" method="post" class="row g-3">
                        <div class="mb-3">
                            <label for="ueusername" class="form-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend"><i data-feather="user"></i></span>
                                <input type="ueusername" class="form-control" id="ueusername" name="ueusername"
                                    aria-describedby="ueusername">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ueemail" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend">
                                    <font size="5">@</font>
                                </span>
                                <input type="email" class="form-control" id="ueemail" name="ueemail"
                                    aria-describedby="ueemail">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="uetest" class="form-label">Test</label>

                            <select class="form-control" id="uetest" name="uetest" aria-describedby="uetest" required>
                                <option value="">Select Subject</option>
                                <?php
                  $query = "select * from quiz_subjects";
                  $qresult = mysqli_query($conn,$query);
                  while ($qrows = mysqli_fetch_array($qresult)) {
                    ?>
                                <option value="<?php echo $qrows['quiz_subject_id'];?>">
                                    <?php echo $qrows['quiz_subject'];?></option>
                                <?php
                  }
                  ?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>

                        </div>

                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary">
                                <font size="4">Edit</font>
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
























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
                        <tr id="title">
                            <th class="bg-secondary">
                                <h2>&nbsp Subjects</h2>
                            </th>
                        </tr>
                    </table>
                    




                        <table id="mytable">
                            <thead>
                                <tr id="header">
                                    <th scope="col" width="10%">
                                        <center>SR. No.</center>
                                    </th>
                                    <th scope="col" width="20%">Subject Name</th>
                                    <th scope="col" width="40%">Description</th>
                                    <th scope="col" width="20%">Total Questions</th>
                                    <th scope="col" width="10%">Total Quiz</th>
                                    <th scope="col" width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
              $zsql = "SELECT * FROM `subjects` WHERE `class_id` = '$class_id'";
              $zresult = mysqli_query($conn, $zsql);
              $sno = 0;
              while($zrow = mysqli_fetch_assoc($zresult)){
                  $sno+=1;
                  echo "<tr>
                  <th scope='row'><center>$sno</center></th>
                  <td>" . $zrow['subject'] . "</td>
                  <td>" . $zrow['description'] . "</td>
                  
                  ";

                  $sid = $zrow['sid'];

                  $csql = "SELECT * FROM `questions` WHERE `sid` = '$sid'";
                  $cresult = mysqli_query($conn, $csql);
                  $total_questions = mysqli_num_rows($cresult);
                  echo "<td>".$total_questions."</td>";
                  
                  $csql = "SELECT * FROM `quiz_subjects` WHERE `sid` = '$sid'";
                  $cresult = mysqli_query($conn, $csql);
                  $total_quiz = mysqli_num_rows($cresult);
                  echo "<td>".$total_quiz."</td>";


                  echo "
                  
                  <td><button class='view btn btn-sm btn-primary'  type='submit'>View</button>
                  <input type='hidden' id='quiz_subject_id_for_result' value='" . $crow['quiz_subject_id'] ."'>
              </tr>";
              }

          ?>

                            </tbody>
                        </table>


<!-- Student Table  -->


<center>
                            <br><br>
                            <table style="border-radius: 20px 20px 0 0; overflow: hidden; ">
                                <tbody>
                                    <tr id="title" class="bg-secondary">
                                        <th width="85%">
                                            <h2>&nbsp Students</h2>
                                        </th>


                                        <th width="15%">
                                            <button class="add btn btn-success" id="" type="submit"
                                                data-bs-toggle="modal" data-bs-target="#modal">
                                                <font size="4"><i data-feather="user-plus"></i>
                                                <b> ADD</b></font>
                                            </button>
                                        </th>

                                    </tr>
                                </tbody>
                            </table>


                            <font size="2">


                                <table id="content-table" class="content-table">
                                    <thead>
                                        <tr id="header">
                                            <th scope="col">
                                                <center>SR. No.</center>
                                            </th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Test</th>           
                                            <th scope="col">Link</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
              include "Partial/dpconnect.php";
              $sql = "SELECT * FROM `users` WHERE `class_id` = '$class_id' AND `role` = 2 ORDER BY `class_id` ASC";
              $result = mysqli_query($conn, $sql);
              $sno = 0;
              while($row = mysqli_fetch_assoc($result)){
                  $sno+=1;
                  echo "<tr>
                  <th scope='row'><center>$sno</center></th>
                  <td>" . $row['username'] . "</td>
                  <td>" . $row['email'] . "</td>

                  <td>" . $row['test'] . "</td>
                  ";
                  echo "
                  
                  
                  <td><button class='mail btn btn-sm btn-success'  type='submit' data-bs-toggle='modal'
                  data-bs-target='#emodal'>Mail</button> </td>

                  <td><button class='ueedit btn btn-sm btn-primary' type='submit' data-bs-toggle='modal'
                  data-bs-target='#ueedit'>Edit</button>
                  <button class='udelete btn btn-sm btn-danger' id='u".$row['sno']."' type='submit'>Delete</button></td>
              </tr>";
              }
?>
                                    </tbody>
                                </table>

                        </center>











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

 // editing user info 
 uedit = document.getElementsByClassName("ueedit");
            Array.from(uedit).forEach((element) => {
                element.addEventListener("click", (e) => {
                    tr = e.target.parentNode.parentNode;
                    ueusername = tr.getElementsByTagName("td")[0].innerText;
                    ueemail = tr.getElementsByTagName("td")[1].innerText;
                    uetest = tr.getElementsByTagName("td")[2].innerText;
                    ueteststatus = tr.getElementsByTagName("td")[3].innerText;

                    document.getElementById("ueusername").value = ueusername;
                    document.getElementById("ueemail").value = ueemail;
                    document.getElementById("uetest").value = uetest;
                    document.getElementById("ueteststatus").value = ueteststatus;



                })
            })



 // for deleting Users 
 udeletes = document.getElementsByClassName("udelete");
            Array.from(udeletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                    sno = e.target.id.substr(1, );
                    console.log(sno);
                    if (confirm("Are you sure you want to delete this user?")) {
                        console.log("yess");
                        window.location = `/Quiz/admin/class.php?udelete=${sno}`;
                    } else {
                        console.log("no");
                    }

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