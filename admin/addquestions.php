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
                                class="btn btn-dark">Subjects</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addquestions.php"><button type="button"
                                class="btn btn-success">Question Bank</button></a>
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

    // For Adding Questions with text
    if (isset($_POST['submit1'])) {
        $psid = $_POST['subjectid'];
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $panswer = $_POST['answer'];
        $qno = 0;
        $vsql = "SELECT * FROM `subjects` where `subjects`.`sid` = '$psid'";
        $vresult = mysqli_query($conn, $vsql);
        $vrow = mysqli_fetch_assoc($vresult);

        $qsql = "SELECT * FROM `questions` where `questions`.`sid` = '$psid'";
        $qresult = mysqli_query($conn, $qsql);
        $count = mysqli_num_rows($qresult);
        $qno = $count+1;
        $vsubject = $vrow['subject'];

        $sql = "INSERT INTO `questions` (`sid`, `qno`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES ('$psid', '$qno', '$question', '$option1', '$option2', '$option3', '$option4', '$panswer')";
        $result = mysqli_query($conn, $sql);

        

        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="subject-success-alert">
        <strong>Success!</strong> Question has been added for : <b><u><strong>'.$vsubject.'</strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        ';

    }
    





    // For Adding Questions with image 
    if (isset($_POST['submit2'])) {
        $psid = $_POST['subjectid'];
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $panswer = $_POST['answer'];
        $qno = 0;
        $vsql = "SELECT * FROM `subjects` where `subjects`.`sid` = '$psid'";
        $vresult = mysqli_query($conn, $vsql);
        $vrow = mysqli_fetch_assoc($vresult);

        $qsql = "SELECT * FROM `questions` where `questions`.`sid` = '$psid'";
        $qresult = mysqli_query($conn, $qsql);
        $count = mysqli_num_rows($qresult);
        $qno = $count+1;
        $vsubject = $vrow['subject'];



        $tm = md5(time());

        $fnm1 = $_FILES["option1"]["name"];
        $dst1="./opt_images/".$tm.$fnm1;
        $dst_db1 = "opt_images/".$tm.$fnm1;
        move_uploaded_file($_FILES["option1"]["tmp_name"],$dst1);

        $fnm2 = $_FILES["option2"]["name"];
        $dst2="./opt_images/".$tm.$fnm2;
        $dst_db2 = "opt_images/".$tm.$fnm2;
        move_uploaded_file($_FILES["option2"]["tmp_name"],$dst2);

        $fnm3 = $_FILES["option3"]["name"];
        $dst3="./opt_images/".$tm.$fnm3;
        $dst_db3 = "opt_images/".$tm.$fnm3;
        move_uploaded_file($_FILES["option3"]["tmp_name"],$dst3);

        $fnm4 = $_FILES["option4"]["name"];
        $dst4="./opt_images/".$tm.$fnm4;
        $dst_db4 = "opt_images/".$tm.$fnm4;
        move_uploaded_file($_FILES["option4"]["tmp_name"],$dst4);


        $sql = "INSERT INTO `questions` (`sid`, `qno`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES ('$psid', '$qno', '$question', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$panswer')";
        $result = mysqli_query($conn, $sql);

        

        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="subject-success-alert">
        <strong>Success!</strong> Question has been added for : <b><u><strong>'.$vsubject.'</strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        ';

    }
    



    
// For Deleting Questions 

if(isset($_GET['qdelete'])){
    $qid = $_GET['qdelete'];
    $vsql = "SELECT * FROM `questions` where `questions`.`qid` = '$qid'";
    $vresult = mysqli_query($conn, $vsql);
    $vrow = mysqli_fetch_assoc($vresult);
    $deletequestion = $vrow['question'];
    $qsid = $vrow['sid'];


    $qsql = "SELECT * FROM `subjects` where `subjects`.`sid` = '$qsid'";
    $qresult = mysqli_query($conn, $qsql);
    $qrow = mysqli_fetch_assoc($qresult);
    $qsubject = $qrow['subject'];

      $sql = "DELETE FROM `questions` WHERE `questions`.`qid` = '$qid'";
      $result = mysqli_query($conn, $sql);
      echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Question has been deleted for: <b><strong>'.$deletequestion.'</strong></b> from subject <b>'.$qsubject.'</b>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    
    }




    
    ?>
    <!-- Modals  -->

    <!-- Add Questions to the Question Bank in Text  -->
    <div class="modal fade" id="qatmodal" tabindex="-1" aria-labelledby="qamodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalLabel">Add Question ( Text )</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Modal form  -->
                    <form action="/Quiz/admin/addquestions.php" method="post" class="row g-3 needs-validation"
                        novalidate>
                        <div class="mb-3">
                            <label for="subjectid" class="form-label">Subject</label>

                            <select class="form-control" id="subjectid" name="subjectid" aria-describedby="subjectid"
                                required>
                                <option value="">Select Subject</option>
                                <?php
                  $query = "select * from subjects";
                  $qresult = mysqli_query($conn,$query);
                  while ($qrows = mysqli_fetch_array($qresult)) {
                    ?>
                                <option value="<?php echo $qrows['sid'];?>"><?php echo $qrows['subject'];?>
                                </option>
                                <?php
                  }
                  ?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="question" class="form-label">Write Question</label>
                            <textarea type="textarea" class="form-control" id="question" name="question"
                                aria-describedby="question" required> </textarea>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option1" class="form-label">Option 1</label>
                            <input type="option1" class="form-control" id="option1" name="option1"
                                aria-describedby="option1" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option2" class="form-label">Option 2</label>
                            <input type="option2" class="form-control" id="option2" name="option2"
                                aria-describedby="option2" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option3" class="form-label">Option 3</label>
                            <input type="option3" class="form-control" id="option3" name="option3"
                                aria-describedby="option3" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option4" class="form-label">Option 4</label>
                            <input type="option4" class="form-control" id="option4" name="option4"
                                aria-describedby="option4" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <select class="form-control" id="answer" name="answer" aria-describedby="answer" required>
                                <option value="">Select Subject</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                            </select>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                </div>

                <div class="modal-footer col-12">
                    <button type="submit" name="submit1" class="btn btn-primary">ADD</button>
                </div>
                </form>






            </div>
        </div>
    </div>

      <!-- Add Questions to the Question in Image  -->
      <div class="modal fade" id="qaimodal" tabindex="-1" aria-labelledby="qamodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalLabel">Add Question ( Image )</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Modal form  -->
                    <form action="/Quiz/admin/addquestions.php" method="post" class="row g-3 needs-validation" enctype="multipart/form-data"
                        novalidate>
                        <div class="mb-3">
                            <label for="subjectid" class="form-label">Subject</label>

                            <select class="form-control" id="subjectid" name="subjectid" aria-describedby="subjectid"
                                required>
                                <option value="">Select Subject</option>
                                <?php
                  $query = "select * from subjects";
                  $qresult = mysqli_query($conn,$query);
                  while ($qrows = mysqli_fetch_array($qresult)) {
                    ?>
                                <option value="<?php echo $qrows['sid'];?>"><?php echo $qrows['subject'];?>
                                </option>
                                <?php
                  }
                  ?>
                            </select>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="question" class="form-label">Write Question</label>
                            <textarea type="textarea" class="form-control" id="question" name="question"
                                aria-describedby="question" required> </textarea>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option1" class="form-label">Option 1</label>
                            <input type="file" class="form-control" id="option1" name="option1"
                                aria-describedby="option1" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option2" class="form-label">Option 2</label>
                            <input type="file" class="form-control" id="option2" name="option2"
                                aria-describedby="option2" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option3" class="form-label">Option 3</label>
                            <input type="file" class="form-control" id="option3" name="option3"
                                aria-describedby="option3" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="option4" class="form-label">Option 4</label>
                            <input type="file" class="form-control" id="option4" name="option4"
                                aria-describedby="option4" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>
                            <select class="form-control" id="answer" name="answer" aria-describedby="answer" required>
                                <option value="">Select Subject</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                            </select>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                </div>

                <div class="modal-footer col-12">
                    <button type="submit" name="submit2" class="btn btn-primary">ADD</button>
                </div>
                </form>






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
                        
                            <table style="border-radius: 20px 20px 0 0; overflow: hidden; ">
                                <tr id="title">
                                    <th width="40%">
                                        <h2>&nbsp Question Bank</h2>
                                    </th>


                                    <th width="30%">
                                    <button class="qadd btn btn-success" type="submit"
                                                    data-bs-toggle="modal" data-bs-target="#qatmodal"><i
                                                        data-feather="plus"></i> ADD Question (Text) </button>

                                    </th>
                                    <th width="30%">
                                    <button class="qadd btn btn-success" type="submit"
                                                    data-bs-toggle="modal" data-bs-target="#qaimodal"><i
                                                        data-feather="plus"></i> ADD Question (Image) </button>

                                    </th>

                                </tr>
                            </table>



                    <!-- Modal form  -->
                    <font size="2">
                        <div class="container col-md-12">
                            <br>


                            <!-- body  -->
                            <?php
        $sql = "SELECT * FROM `subjects`";
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        while($row = mysqli_fetch_assoc($result)){
            
            $sid=$row['sid'];
            $subject = $row['subject'];
            $totalquestion = $row['totalquestion'];
            $totalmark = $row['totalmark'];
            ?>

                            <table id="mytable">
                                <thead>
                                    <tr id="header">
                                        <th colspan='8'>
                                            <font size="4"> <?php echo $subject;  ?></font>
                                        </th>
                                    </tr>
                                    <tr class="table-success">
                                        <th scope="col" width="10%">
                                            <center>SR. No.</center>
                                        </th>
                                        <th scope="col" width="30%">Questions</th>
                                        <th scope="col" width="10%">Option 1</th>
                                        <th scope="col" width="10%">Option 2</th>
                                        <th scope="col" width="10%">Option 3</th>
                                        <th scope="col" width="10%">Option 4</th>
                                        <th scope="col" width="10%">Answers</th>
                                        <th scope="col" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
  $qsql = "SELECT * FROM `questions` where `questions`.`sid` = '$sid'";
  $qresult = mysqli_query($conn, $qsql);
$temp = $qresult;
  $qsno = 0;
  
  while($qrow = mysqli_fetch_assoc($qresult)){
      $qsno+=1;
      $question = $qrow['question'];
      $display_question = str_replace("\n","<br>",$question);
      echo "<tr>
      <th scope='row'><center>$qsno</center></th>
      <td>" . $display_question . "</td>
      ";
      ?>
      <td><?php 
      if (strpos($qrow['option1'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option1']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option1'];
      }
      ?></td>

<td><?php 
      if (strpos($qrow['option2'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option2']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option2'];
      }
      ?></td>

<td><?php 
      if (strpos($qrow['option3'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option3']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option3'];
      }
      ?></td>

<td><?php 
      if (strpos($qrow['option4'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option4']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option4'];
      }
      ?></td>

      <td><?php
       echo $qrow['answer'] 
       ?></td>

      <td><button class='qdelete btn btn-sm btn-danger' id='q<?php echo $qrow['qid']?>' type='submit'>Delete</button></td>

  </td>

      </tr>
      <?php 
  }
  
$_SESSION['totalquestionaddedfor'.$subject] = $qsno;
if ($_SESSION['totalquestionaddedfor'.$subject]==0) {
    echo '
    <tr class="table-secondary text-center">
                                   <th colspan="8"> No Data Available  </th>
                                </tr>
                                ';
}
?>

                                    <tr class="table-secondary">
                                        <td colspan="8">
                                            <?php  echo "<b>Note:</b> Total ".$_SESSION['totalquestionaddedfor'.$subject]." Questions. Each Questions contains Equal marks.</b>"; ?>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <br>
                            <?php
        }

?>



                            <br> <br>
                        </div>
                    </font>






                





   






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


        // for deleting Questions 
        qdeletes = document.getElementsByClassName("qdelete");
        Array.from(qdeletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                qid = e.target.id.substr(1, );
                console.log(qid);
                if (confirm("Are you sure you want to delete this question?")) {
                    console.log("yess");
                    window.location = `/Quiz/admin/addquestions.php?qdelete=${qid}`;
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