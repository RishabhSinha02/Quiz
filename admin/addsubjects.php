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






    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Quiz/admin/addstudent.php"><b><font color="#16a085">THE </font><font size="6" color="#5A6EA5"> QUIZ </font></b></a> &nbsp &nbsp
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   

            <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Quiz/admin/add_class.php"><b><button
                                    type="button" class="btn btn-dark">Class</button></b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addsubjects.php"><button type="button"
                                class="btn btn-success">Subjects</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addquestions.php"><button type="button"
                                class="btn btn-dark">Question Bank</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addquiz.php"><button type="button"
                                class="btn btn-dark">Quiz</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Quiz/admin/addstudent.php"><b><button
                                    type="button" class="btn btn-dark">Students</button></b></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/result.php"><button type="button"
                                class="btn btn-dark">Results</button></a>
                    </li>



                </ul>
                <form action="/Quiz/logout.php" class="d-flex">
                    <button class="btn btn-outline-warning" type="submit"><i data-feather="log-out"></i>
                        <font size="2"><b> Logout</b></font>
                    </button>
                </form>

            </div>
        </div>
    </nav>


    <?php

    // POSTs
     
//  Adding Subject
if (isset($_POST['sEmail'])) {  //Check for Add for Inserting data to list
  $subject = $_POST['subject'];
  $class_id = $_POST['class_id'];
  $description = $_POST['description'];

  $vsql = "SELECT * FROM `class` WHERE `class_id` = '$class_id'";
  $vresult = mysqli_query($conn, $vsql);
  $vrow = mysqli_fetch_assoc($vresult);
  $class_name = $vrow['class_name'];
  

  $sql = "INSERT INTO `subjects` (`subject`, `description`, `class_id`, `class_name`) VALUES ('$subject', '$description', '$class_id', '$class_name')";
  $result = mysqli_query($conn, $sql);
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="subject-success-alert">
        <strong>Success!</strong> Subject has been added for : <b><strong><u><?php echo $subject; ?></strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php
}


//  Deleteing the Subjects
if(isset($_GET['delete'])){
    $sid = $_GET['delete'];
        $vsql = "SELECT * FROM `subjects` where `subjects`.`sid` = '$sid'";
        $vresult = mysqli_query($conn, $vsql);
        $vrow = mysqli_fetch_assoc($vresult);
        $deletesubject = $vrow['subject'];
    
    
      $sql = "DELETE FROM `subjects` WHERE `subjects`.`sid` = '$sid'";
      $result = mysqli_query($conn, $sql);
      echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Subject has been deleted for: <b><u><strong>'.$deletesubject.'</strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    
    }



?>






    <!-- Modals  -->

    <!-- Modal for adding subject  -->
    <div class="modal fade" id="smodal" tabindex="-1" aria-labelledby="smodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="smodalLabel">Add Subject</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Subject Modal form  -->

                    <form action="/Quiz/admin/addsubjects.php" method="post" class="row g-3 needs-validation"
                        novalidate>
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Class</label>

                            <select class="form-control" id="class_id" name="class_id" aria-describedby="class_id"
                                required>
                                <option value="">Select Class</option>
                                <?php
                  $query = "select * from class";
                  $qresult = mysqli_query($conn,$query);
                  while ($qrows = mysqli_fetch_array($qresult)) {
                    ?>
                                <option value="<?php echo $qrows['class_id'];?>"><?php echo $qrows['class_name'];?>
                                </option>
                                <?php
                  }
                  ?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>

                        </div>

                        <input type="hidden" name="sEmail" id="sEmail">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Course Name</label>

                            <input type="subject" class="form-control" id="subject" name="subject"
                                aria-describedby="subject" required>


                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                                <textarea type="textarea" class="form-control" id="description" name="description"
                                aria-describedby="description" required> </textarea>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        
                        <div class="col-12">
                            <button id="subject-add" type="submit" class="btn btn-primary">ADD</button>
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
                            <th width="85%">
                                <h2>&nbsp Subjects</h2>
                            </th>


                            <th width="15%">
                                    <button class="add btn btn-success" id="" type="submit"
                                        data-bs-toggle="modal" data-bs-target="#smodal">
                                        <i data-feather="file-plus"></i>
                                        <font size="4"><b> ADD</b></font>
                                    </button>
                            </th>

                        </tr>
                    </table>
                    <font size="2">




                            <table id="mytable">
                                <thead>
                                    <tr id="header">
                                        <th scope="col">
                                            <center>SR. No.</center>
                                        </th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
              $sql = "SELECT * FROM `subjects`";
              $result = mysqli_query($conn, $sql);
              $sno = 0;
              while($row = mysqli_fetch_assoc($result)){
                  $sno+=1;
                  echo "<tr>
                  <th scope='row'><center>$sno</center></th>
                  <td>" . $row['subject'] . "</td>
                  <td>" . $row['class_name'] . "</td>
                  <td>" . $row['description'] ."</td>
                  <td>
                  <button class='delete btn btn-sm btn-danger' type='submit' id='d".$row['sid']."'> Delete </button>
                  </td>
              </tr>";
              }
?>
                                </tbody>
                            </table>







                            <br>









                        </div>

                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>


        <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()


        // for deleting Subjects
  
        deletes = document.getElementsByClassName("delete");
            Array.from(deletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                    sno = e.target.id.substr(1, );
                    console.log(sno);
                    if (confirm("Are you sure you want to delete this subject?")) {
                        console.log("yess");
                        window.location = `/Quiz/admin/addsubjects.php?delete=${sno}`;
                    } else {
                        console.log("no");
                    }

                })
            })



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
</body>

</html>