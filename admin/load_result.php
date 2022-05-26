<?php
if ($_POST['email']) {
    $email = $_POST['email'];
    $quiz_subject_id = $_POST['qsid'];
session_start(); //access to user informations through session variables
include "../Partial/dpconnect.php"; // connection with database

//    View Modal content
$sql = "SELECT * FROM `results` WHERE `email` LIKE '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sid =$row['sid'];





                $qsql = "SELECT * FROM `quiz_questions` WHERE `quiz_questions`.`quiz_subject_id` = '$quiz_subject_id'";
                $qresult = mysqli_query($conn, $qsql);

                while($qrow = mysqli_fetch_assoc($qresult)){
?>

<div class="card">
    <div class="card-header bg-secondary text-white">
        <?php 
        $question = $qrow['question'];
        $display_question = str_replace("\n","<br>",$question);
        echo "Q.".$qrow['qno']."] ".$display_question.".";
        ?>
    </div>
    <div class="card-body bg-light">
        <ol>
            <li>
                <?php

                            
$qid = $qrow['qid'];
$vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `quiz_subject_id` LIKE '$quiz_subject_id' AND `qid` LIKE '$qid'";
$vresult = mysqli_query($conn, $vsql);
while ($vrow = mysqli_fetch_assoc($vresult)) {
    $sel_opt = $vrow['selected_option'];
}


if (strpos($qrow['option1'],'opt_images/')!== false) {
    $option1 = '<img src="'.$qrow['option1'].'" width="50" height="50" >';

}else {
  $option1 = $qrow['option1'];
}


if ($sel_opt=='option1' && $qrow['answer']!='option1') {
    echo "<div class='text-danger'><b>".$option1."&nbsp;"."<i data-feather='x'></i></b></div>";
}
else if ($qrow['answer']=='option1') {
    echo "<div class='text-success'><b>".$option1."&nbsp;"."<i data-feather='check'></i></b></div>";
}
else {
    echo $option1;
}

?>
            </li>

            <li>
                <?php

                            
                                        $qid = $qrow['qid'];
                                        $vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `sid` LIKE '$sid' AND `qid` LIKE '$qid'";
                                        $vresult = mysqli_query($conn, $vsql);
                                        while ($vrow = mysqli_fetch_assoc($vresult)) {
                                            $sel_opt = $vrow['selected_option'];
                                        }

                                        if (strpos($qrow['option1'],'opt_images/')!== false) {
                                            $option2 = '<img src="'.$qrow['option2'].'" width="50" height="50" >';
                                        
                                        }else {
                                          $option2 = $qrow['option2'];
                                        }

                                        if ($sel_opt=='option2' && $qrow['answer']!='option2') {
                                            echo "<div class='text-danger'><b>".$option2."&nbsp;"."<i data-feather='x'></i></b></div>";
                                        }
                                        else if ($qrow['answer']=='option2') {
                                            echo "<div class='text-success'><b>".$option2."&nbsp;"."<i data-feather='check'></i></b></div>";
                                        }
                                        else {
                                            echo $option2;
                                        }

                                ?>
            </li>

            <li>
                <?php

$qid = $qrow['qid'];
$vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `sid` LIKE '$sid' AND `qid` LIKE '$qid'";
$vresult = mysqli_query($conn, $vsql);
while ($vrow = mysqli_fetch_assoc($vresult)) {
    $sel_opt = $vrow['selected_option'];
}


if (strpos($qrow['option1'],'opt_images/')!== false) {
    $option3 = '<img src="'.$qrow['option3'].'" width="50" height="50" >';

}else {
  $option3 = $qrow['option3'];
}

if ($sel_opt=='option3' && $qrow['answer']!='option3') {
    echo "<div class='text-danger'><b>".$option3."&nbsp;"."<i data-feather='x'></i></b></div>";
}
else if ($qrow['answer']=='option3') {
    echo "<div class='text-success'><b>".$option3."&nbsp;"."<i data-feather='check'></i></b></div>";
}
else {
    echo $option3;
}

?>
            </li>

            <li>
                <?php

                            
$qid = $qrow['qid'];
$vsql = "SELECT * FROM `view` WHERE `email` LIKE '$email' AND `sid` LIKE '$sid' AND `qid` LIKE '$qid'";
$vresult = mysqli_query($conn, $vsql);
while ($vrow = mysqli_fetch_assoc($vresult)) {
    $sel_opt = $vrow['selected_option'];
}
if (strpos($qrow['option1'],'opt_images/')!== false) {
    $option4 = '<img src="'.$qrow['option4'].'" width="50" height="50" >';

}else {
  $option4 = $qrow['option4'];
}
if ($sel_opt=='option4' && $qrow['answer']!='option4') {
    echo "<div class='text-danger'><b>".$option4."&nbsp;"."<i data-feather='x'></i></b></div>";
}
else if ($qrow['answer']=='option4') {
    echo "<div class='text-success'><b>".$option4."&nbsp;"."<i data-feather='check'></i></b></div>";
}
else {
    echo $option4;
}

?>
            </li>


        </ol>
        <?php
                                $vresult = mysqli_query($conn, $vsql);
                    while ($vrow = mysqli_fetch_assoc($vresult)) {
                        $sel_opt = $vrow['selected_option'];
                    }
                    if ($sel_opt == "") {
                        echo "<div class='text-danger'><b><i data-feather='slash'></i> [Not Attempted]</b></div>";
                    }
                    ?>
    </div>
    <div class="card-footer bg-light">
        <b>For: </b> 
        <?php 
        $vqsql = "SELECT * FROM `quiz_subjects` WHERE `sid` = '$sid'";
        $vqresult = mysqli_query($conn, $vqsql);
        $vqrow = mysqli_fetch_assoc($vqresult);
        $totalmark= $vqrow['quiz_total_marks'];
        $totalquestion= $vqrow['quiz_total_questions'];
        echo $totalmark/$totalquestion." Marks";  
                            ?>
    </div>
</div>
<br>








<?php
                    
                }
              }
?>
 <script>
        feather.replace()
        </script>