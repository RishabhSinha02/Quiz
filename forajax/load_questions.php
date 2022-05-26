<?php
session_start(); //access to user informations through session variables
include "../Partial/dpconnect.php"; // connection with database

$question_no ="";
$question ="";
$option1 ="";
$option2 ="";
$option3 ="";
$option4 ="";
$answer ="";
$count ="";
$ans ="";

$queno = $_GET['questionno'];

if (isset($_SESSION['answer'][$queno])) {
    $ans = $_SESSION['answer'][$queno];
}

$quiz_subject_id = $_SESSION['quiz_subject_id'];
$qid = $_GET['questionno'];
$zsql = "SELECT * FROM `quiz_questions` WHERE `qno` = '$queno' AND `quiz_subject_id` = '$quiz_subject_id'";
$zresult = mysqli_query($conn, $zsql);
$count = mysqli_num_rows($zresult);
  
 
if ($count==0) {
    echo "over";
}
else{
    while($row = mysqli_fetch_array($zresult)){
        $question_no= $row['qno'];
        $question= $row['question'];


      if (strpos($row['option1'],'opt_images/')!== false) {
          $option1 = '<img src="admin/'.$row['option1'].'" width="100" height="100" >';
    
      }else {
        $option1 = $row['option1'];
      }


      if (strpos($row['option2'],'opt_images/')!== false) {
        $option2 = '<img src="admin/'.$row['option2'].'" width="100" height="100" >';
  
    }else {
      $option2 = $row['option2'];
    }


    if (strpos($row['option3'],'opt_images/')!== false) {
        $option3 = '<img src="admin/'.$row['option3'].'" width="100" height="100" >';
  
    }else {
      $option3 = $row['option3'];
    }


    if (strpos($row['option4'],'opt_images/')!== false) {
        $option4 = '<img src="admin/'.$row['option4'].'" width="100" height="100" >';
  
    }else {
      $option4 = $row['option4'];
    }


    }
    ?>



<div class="que_text">
    <?php 
            $display_question = str_replace("\n","<br>",$question);
            echo " ( ".$question_no." ) ". $display_question; 
            ?>
</div>


<div class="option_list">
    <!-- Here I've inserted options from JavaScript -->
    <div class="option">
        <input type="radio" name="rl" id="rl" value="option1"
            onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
            if ($ans== "option1") {
                echo "checked";
            }
            ?>>
        &nbsp;
        <label for="rl"><?php echo $option1; ?></label>
    </div>


    <div class="option">
        <input type="radio" name="rl" id="rl" value="option2"
            onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
            if ($ans== "option2") {
                echo "checked";
            }
            ?>>
        &nbsp;
        <label for="rl"><?php echo $option2; ?></label>
    </div>
    <div class="option">
        <input type="radio" name="rl" id="rl" value="option3"
            onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
            if ($ans== "option3") {
                echo "checked";
            }
            ?>>
        &nbsp;
        <label for="rl"><?php echo $option3; ?></label>
    </div>
    <div class="option">
        <input type="radio" name="rl" id="rl" value="option4"
            onclick="radioclick(this.value,<?php echo $question_no ?>)" <?php
            if ($ans== "option4") {
                echo "checked";
            }
            ?>>
        &nbsp;
        <label for="rl"><?php echo $option4; ?></label>
    </div>
</div>

<?php
}
?>