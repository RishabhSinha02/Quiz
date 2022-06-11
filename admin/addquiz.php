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
    <link rel="stylesheet" href="/Quiz/css/home.css">
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
            <a class="navbar-brand" href="/Quiz/admin/addstudent.php"><b>
                    <font color="#16a085">THE </font>
                    <font size="6" color="#5A6EA5"> QUIZ </font>
                </b></a> &nbsp &nbsp
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addsubjects.php"><button type="button"
                                class="btn btn-dark">Subjects</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addquestions.php"><button type="button"
                                class="btn btn-dark">Question Bank</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Quiz/admin/addquiz.php"><button type="button"
                                class="btn btn-success">Quiz</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Quiz/admin/addstudent.php"><b><button
                                    type="button" class="btn btn-dark">Students</button></b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Quiz/admin/add_class.php"><b><button
                                    type="button" class="btn btn-dark">Class</button></b></a>
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


//Alerts





//POSTS
?>


    <?php


// Adding Quiz
if(isset($_POST['quiz_question'])){
    $quiz_subject = $_POST['quiz_subject'];
    $quiz_questions = $_POST['quiz_question'];

    $sid = $_POST['quiz_sid'];
    $totalquestion = $_POST['quiz_totalquestion'];
    $totalmark = $_POST['quiz_totalmark'];
    $exam_time = $_POST['quiz_examtime'];

    $sql = "INSERT INTO `quiz_subjects` (`quiz_subject_id`, `sid`, `quiz_subject`, `quiz_total_questions`, `quiz_total_marks`, `quiz_exam_time`) VALUES (NULL, '$sid', '$quiz_subject', '$totalquestion', '$totalmark', '$exam_time')";
    $result = mysqli_query($conn, $sql);

    $vsql ="SELECT * FROM `quiz_subjects` ";
    $vresult = mysqli_query($conn, $vsql);
    while($vrow = mysqli_fetch_assoc($vresult)){
        $quiz_subject_id = $vrow['quiz_subject_id'];
    }

    
    foreach ($quiz_questions as $key => $values) {
        $sql ="SELECT * FROM `questions` WHERE `qid` = '$values'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $quiz_question = $row['question'];
        $option1 = $row['option1'];
        $option2 = $row['option2'];
        $option3 = $row['option3'];
        $option4 = $row['option4'];
        $answer = $row['answer'];
        $qid = $row['qid'];
        $sid = $row['sid'];



        $qsql = "SELECT * FROM `quiz_questions` where `quiz_questions`.`quiz_subject_id` = '$quiz_subject_id'";
        $qresult = mysqli_query($conn, $qsql);
        $count = mysqli_num_rows($qresult);
        $qno = $count+1;

        $asql= "INSERT INTO `quiz_questions` (`quiz_questions_id`, `quiz_subject_id`, `qid`, `sid`, `qno`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES (NULL, '$quiz_subject_id', '$qid', '$sid', '$qno', '$quiz_question', '$option1', '$option2', '$option3', '$option4', '$answer');"; 
        $aresult = mysqli_query($conn, $asql);
    }
      echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Quiz has been Added for: <b><u><strong>'.$quiz_subject.'</strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    
    }


        //  Editing the Quiz
if(isset($_POST['quiz_subject_id'])){
    $quiz_subject_id = $_POST['quiz_subject_id'];
    $qsubject = $_POST['qsubject'];
    $qtotalquestions = $_POST['qtotalquestions'];
    $qtotalmark = $_POST['qtotalmark'];
    $qexam_time = $_POST['qexam_time'];

    $eqsql = "UPDATE `quiz_subjects` SET `quiz_subject` = '$qsubject', `quiz_total_questions` = '$qtotalquestions', `quiz_total_marks` = '$qtotalmark', `quiz_exam_time` = '$qexam_time' WHERE `quiz_subjects`.`quiz_subject_id` = '$quiz_subject_id'";
    $eqesult = mysqli_query($conn, $eqsql);

      echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Quiz has been edited for: <b><u><strong>'.$qsubject.'</strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    
    }








    //  Deleteing the Quiz
if(isset($_GET['qdelete'])){
    $sno = $_GET['qdelete'];

    $vsql = "SELECT * FROM `quiz_subjects` where `quiz_subjects`.`quiz_subject_id` = '$sno'";
    $vresult = mysqli_query($conn, $vsql);
    $vrow = mysqli_fetch_assoc($vresult);
    $deletesubject = $vrow['quiz_subject'];

      $sql = "DELETE FROM `quiz_subjects` WHERE `quiz_subjects`.`quiz_subject_id` = '$sno'";
      $result = mysqli_query($conn, $sql);
      echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Quiz has been deleted for: <b><u><strong>'.$deletesubject.'</strong></b></u>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
    
    }




?>


    <!-- MODALS  -->



    <!--Modal for adding Quiz Subject -->
    <div class="modal fade" id="smodal" tabindex="-1" aria-labelledby="smodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="smodalLabel">Add Quiz</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Subject Modal form  -->
                    <form action="/Quiz/admin/select_questions.php" method="post" class="row g-3 needs-validation"
                        novalidate>
                        <input type="hidden" name="sEmail" id="sEmail">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Course Name</label>

                            <select class="form-control" id="subject" name="subject" aria-describedby="subject"
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

                            <!-- 
                            <input type="subject" class="form-control" id="subject" name="subject"
                                aria-describedby="subject" required> -->


                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="totalquestion" class="form-label">Total Questions</label>
                            <input type="number" class="form-control" id="totalquestion" name="totalquestion"
                                aria-describedby="totalquestion" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="totalmark" class="form-label">Total Marks</label>
                            <input type="number" class="form-control" id="totalmark" name="totalmark"
                                aria-describedby="totalmark" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exam_time" class="form-label">Exam Duration (in mins)</label>
                            <input type="number" class="form-control" id="exam_time" name="exam_time"
                                aria-describedby="exam_time"  onkeypress="disable_button()" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>

<br>
                            <input type="checkbox" class="btn-check" name=""
                                id="btn-check-1-outlined" autocomplete="off" onclick="disable_input()">
                            <label class="btn btn-outline-warning" for="btn-check-1-outlined">Disable Time</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>


                        </div>

                            

                        <div class="col-12">
                            <button id="subject-add" type="submit" class="btn btn-primary">PROCEED</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>




    <!--For editing subject info -->
    <div class="modal fade" id="qedit" tabindex="-1" aria-labelledby="seditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="seditLabel">Edit Quiz Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <!-- Subject Modal form  -->
                    <form action="/Quiz/admin/addquiz.php" method="post" class="row g-3 needs-validation" novalidate>
                        <input type="hidden" class="form-control" id="quiz_subject_id" name="quiz_subject_id"
                            aria-describedby="quiz_subject_id">
                        <div class="mb-3">
                            <label for="show_subject" class="form-label">Subject</label>
                            <input type="name" class="form-control" id="show_subject" name="show_subject"
                                aria-describedby="show_subject" disabled>
                        </div>
                        <input type="hidden" class="form-control" id="qsubject" name="qsubject"
                            aria-describedby="qsubject">

                        <div class="mb-3">
                            <label for="show_totalquestion" class="form-label">Total Questions</label>
                            <input type="name" class="form-control" id="show_totalquestion" name="show_totalquestion"
                                aria-describedby="show_totalquestion" disabled>
                        </div>
                        <input type="hidden" class="form-control" id="qtotalquestions" name="qtotalquestions"
                            aria-describedby="qtotalquestions">

                        <div class="mb-3">
                            <label for="qtotalmark" class="form-label">Total Marks</label>
                            <input type="number" class="form-control" id="qtotalmark" name="qtotalmark"
                                aria-describedby="qtotalmark" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="qexam_time" class="form-label">Exam Duration (in mins)</label>
                            <input type="number" class="form-control" id="qexam_time" name="qexam_time"
                                aria-describedby="qexam_time" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <button id="subject-add" type="submit" class="btn btn-primary">Edit</button>
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



                <!-- Subjects  -->

                <div class="card mb-3 content">

                    <div class="card-body">
                        <center>
                            <br>
                            <table style="border-radius: 20px 20px 0 0; overflow: hidden; ">
                                <tr id="title">
                                    <th width="85%">
                                        <h2>&nbsp Quiz</h2>
                                    </th>


                                    <th width="15%">
                                        <a href="#">
                                            <button class="add btn btn-success" id="" type="submit"
                                                data-bs-toggle="modal" data-bs-target="#smodal">
                                                <i data-feather="file-plus"></i>
                                                <font size="4"><b> ADD</b></font>
                                            </button>
                                        </a>

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
                                            <th scope="col">Total Question</th>
                                            <th scope="col">Total Marks</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
              $sql = "SELECT * FROM `quiz_subjects`";
              $result = mysqli_query($conn, $sql);
              $sno = 0;
              while($row = mysqli_fetch_assoc($result)){
                  $sno+=1;
                  echo "<tr>
                  <th scope='row'><center>$sno</center></th>
                  <td>" . $row['quiz_subject'] . "</td>
                  <td>" . $row['quiz_total_questions'] . "</td>
                  <td>" . $row['quiz_total_marks'] . "</td>
                  ";?>
                  <td><?php
                  if ($row['quiz_exam_time']==999) {
                      echo "Disabled";
                  } 
                  else{
                    echo $row['quiz_exam_time']," mins";
                  }
                  
                  ?></td>
                  <?php
                  echo "
                  <td><button class='qedit btn btn-sm btn-primary' type='submit' id='e".$row['quiz_subject_id']."' data-bs-toggle='modal'
                  data-bs-target='#qedit'> Edit </button>
                  <button class='qdelete btn btn-sm btn-danger' type='submit' id='d".$row['quiz_subject_id']."'> Delete </button>
                  </td>
              </tr>";
              }
?>
                                    </tbody>
                                </table>
                        </center>
                    </div>
                </div>
                </font>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous">
            </script>





            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous">
            </script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

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
            </script>

            <script>
            // editing Quiz info 
            qedits = document.getElementsByClassName("qedit");
            Array.from(qedits).forEach((element) => {
                element.addEventListener("click", (e) => {
                    tr = e.target.parentNode.parentNode;
                    qsubject = tr.getElementsByTagName("td")[0].innerText;
                    qtotalquestions = tr.getElementsByTagName("td")[1].innerText;
                    qtotalmarks = tr.getElementsByTagName("td")[2].innerText;
                    duration = tr.getElementsByTagName("td")[3].innerText;
                    var qtime = duration.split(" ");
                    qduration = qtime[0];

                    quiz_subject_id = e.target.id.substr(1, );


                    // stotalquestion = tr.getElementsByTagName("td")[1].innerText;
                    // stotalmark = tr.getElementsByTagName("td")[2].innerText;
                    // sexam_time = tr.getElementsByTagName("td")[3].innerText;
                    console.log(quiz_subject_id, '\n');
                    console.log(qsubject, '\n')
                    console.log(qtotalquestions, '\n')
                    console.log(qtotalmarks, '\n')
                    console.log(qduration, '\n')

                    document.getElementById("quiz_subject_id").value = quiz_subject_id;

                    document.getElementById("show_subject").value = qsubject;
                    document.getElementById("qsubject").value = qsubject;

                    document.getElementById("show_totalquestion").value = qtotalquestions;
                    document.getElementById("qtotalquestions").value = qtotalquestions;

                    document.getElementById("qtotalmark").value = qtotalmarks;

                    document.getElementById("qexam_time").value = qduration;


                    // console.log(exam_time);


                })
            })



            // for deleting Quiz
            qdeletes = document.getElementsByClassName("qdelete");
            Array.from(qdeletes).forEach((element) => {
                element.addEventListener("click", (e) => {
                    sno = e.target.id.substr(1, );
                    console.log(sno);
                    if (confirm("Are you sure you want to delete this user?")) {
                        console.log("yess");
                        window.location = `/Quiz/admin/addquiz.php?qdelete=${sno}`;
                    } else {
                        console.log("no");
                    }

                })
            })






            // for diable time 
            const button = document.getElementById("btn-check-1-outlined");
            const time_input = document.getElementById("exam_time");
            function disable_input() {
                if (time_input.type == 'hidden') {
                    time_input.value = null;
                    time_input.type = 'number';
                }
                else{
                    time_input.value = 999;
                    time_input.type = 'hidden';
                }
                
            }

            // disable_button.addEventListener("keypress", (e)=>{
            //     const value = e.currentTarget.value;
            //     console.log("hiii");
            // });

            function disable_button(){
                const v = button.value;
                if (v === "") {
                    button.disabled = false;
                }
                else{
                    button.disabled = true;
                }
            }









            </script>





            </script>

            <script>
            feather.replace()
            </script>


</body>

</html>