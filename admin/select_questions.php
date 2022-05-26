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
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="/Quiz/css/home.css"> -->
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Select Questions</title>
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
    width: 1300px;
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


    <?php
//  Adding Quiz Subject
if (isset($_POST['sEmail'])) {  //Check for Add for Inserting data to list
  $sid = $_POST['subject'];
  $totalquestion = $_POST['totalquestion'];
  $totalquestionforjs = $totalquestion +1;
  $totalmark = $_POST['totalmark'];
  $exam_time = $_POST['exam_time'];

  $ssql = "Select * from subjects where sid='$sid'";
  $sresult = mysqli_query($conn, $ssql); 
  $srows = mysqli_fetch_assoc($sresult); 
  $subject = $srows['subject'];

?>

    <div class="card mb-4 content" style="padding:20px;">
        <div>
            <span id="notvalid">

            </span>
        </div>
        <form action="/Quiz/admin/addquiz.php" method="post">
            <input type="hidden" class="quiz_subject" id="quiz_subject" name="quiz_subject"
                value="<?php echo $subject; ?>">
            <input type="hidden" class="quiz_sid" id="quiz_sid" name="quiz_sid" value="<?php echo $sid; ?>">
            <input type="hidden" class="quiz_totalquestion" id="quiz_totalquestion" name="quiz_totalquestion"
                value="<?php echo $totalquestion; ?>">
            <input type="hidden" class="quiz_totalmark" id="quiz_totalmark" name="quiz_totalmark"
                value="<?php echo $totalmark; ?>">
            <input type="hidden" class="quiz_examtime" id="quiz_examtime" name="quiz_examtime"
                value="<?php echo $exam_time; ?>">
                <center>
                <table id="mytable" style="border-radius: 20px 20px 0 0; overflow: hidden; ">
                <thead>
                    <tr id="title">
                        <th colspan='4'>
                            <font size="5"> Select <?php echo $totalquestion;  ?> Question for <?php echo $subject;  ?>
                                Quiz.</font>
                        </th>
                        <th colspan='2' class="text-center">
                            <font size="5"> <button id="select_random" class="btn btn-primary"><b>Select Random</b></button>
                            </font>
                        </th>
                        <th colspan='2' class="text-center">
                            <font size="5"> <button type="submit" class="btn btn-warning"><b>ADD QUIZ</b></button>
                            </font>
                        </th>
                    <tr id="header">
                        <th scope="col" width="10%">
                            SR. No.
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
      $qid = $qrow['qid'];
      $question = $qrow['question'];
      $display_question = str_replace("\n","<br>",$question);
      echo "<tr>
      <th scope='row'><center>$qsno</center></th>
      <td>" . $display_question . "</td>
      ";?>
      <td>
      <?php 
      if (strpos($qrow['option1'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option1']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option1'];
      }
      ?>
      </td>
      <td><?php 
      if (strpos($qrow['option2'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option2']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option2'];
      }
      ?>
      </td>
      <td><?php 
      if (strpos($qrow['option3'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option3']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option3'];
      }
      ?>
      </td>
      <td>
      <?php 
      if (strpos($qrow['option4'],'opt_images/')!== false) {
          ?>
          <img src="<?php echo $qrow['option4']; ?>" width="50" height="50" >
          <?php
      }else {
        echo $qrow['option4'];
      }
      ?>
      </td>
      <td><?php
       echo $qrow['answer'] 
       ?>
       </td>
      <td class='text-center'>
          <?php
      echo '
      <input type="checkbox" class="btn-check" name="quiz_question[]" id="btn-check-'.$qsno.'-outlined" autocomplete="off" value="'.$qid.'" onclick="return select_only()">
      <label class="btn btn-outline-success" for="btn-check-'.$qsno.'-outlined">Select</label><br>
      </td>

  </td>

      </tr>
      ';
      
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
                </tbody>

            </table>
            </center>


        </form>









    </div>


    <?php
}
else{
    header("location: addquiz.php");
}
?>








    <script type="text/javascript">
    function select_only() {
        <?php
        echo "let qnu = '$totalquestionforjs'; ";   
        ?>
        var a = document.getElementsByName('quiz_question[]');
        var newvar = 0;
        var count;
        for (count = 0; count < a.length; count++) {
            if (a[count].checked == true) {
                newvar = newvar + 1;
            }
        }

        if (newvar >= qnu) {
            document.getElementById('notvalid').innerHTML =
                '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Alert!</strong> You can select Only ' +
                (qnu - 1) +
                ' Questions for this Quiz. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            return false;
        }
    }
    </script>


<!-- For selection Random Quesrions  -->
<script type="text/javascript">

let btn = document.getElementById('select_random');


function getRandomNumber(min, max) {
    let step1 = max - min + 1;
    let step2 = Math.random() * step1;
    let result = Math.floor(step2) + min;
    return result;
}
function createArrayOfNumbers(start, end){
    let myArray = [];
    for(let i = start; i <= end; i++) { 
        myArray.push(i);
    }
    return myArray;
}
let numbersArray = createArrayOfNumbers(1,10);
btn.addEventListener('click', () => {
    if(numbersArray.length == 0){
        output.innerText = 'No More Random Numbers';
        return;
    }
    let randomIndex = getRandomNumber(0, numbersArray.length-1);
    let randomNumber = numbersArray[randomIndex];
    numbersArray.splice(randomIndex, 1)
    output.innerText = randomNumber;
});

</script>







    <!-- Optional JavaScript; choose one of the two! -->
    <script>
    feather.replace()
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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