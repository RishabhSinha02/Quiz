<?php
session_start(); //access to user informations through session variables
include "Partial/dpconnect.php"; // connection with database
error_reporting(E_ERROR | E_PARSE);

?>

<?php
// Not loginned index page 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {  
    header("location: login.php");
} // Checks login  false
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

.quiz_box{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 550px;
    background: #fff;
    border-radius: 5px;
}

.quiz_box header{
    position: relative;
    z-index: 99;
    height: 70px;
    padding: 0 30px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 5px 5px 0 0;
    box-shadow: 0px 3px 5px 1px rgba(0, 0, 0, 0.1);
}

.quiz_box header .title{
    font-size: 20px;
    font-weight: 600;
}


.quiz_box header .timer{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 185px;
    height: 45px;
    background: #cce5ff;
    border: 1px solid #b8daff;
    border-radius: 5px;
    padding: 0 8px;
}

.quiz_box header .timer .time_text{
    font-weight: 400;
    font-size: 17px;
    user-select: none;
}


.quiz_box header .timer .timer_sec{
    font-size: 18px;
    font-weight: 500;
    background: #343a40;
    height: 30px;
    width: 90px;
    color: #fff;
    text-align: center;
    line-height: 30px;
    border-radius: 5px;
    border: 1px solid #343a40;
    user-select: none;
}

.quiz_box section{
    padding: 25px 30px 20px 30px;
    background: #fff;

}

.quiz_box section .que_text{
    font-size: 25px;
    font-weight: 600;
}

.quiz_box section .option_list{
    padding: 20px 0;
    display: block;
}

section .option_list .option{
    background: aliceblue;
    border: 1px solid #84c5fe;
    border-radius: 5px;
    padding: 8px 15px;
    font-size: 17px;
    margin-bottom: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

section .option_list .option:hover{
    color: #004085;
    background: #cce5ff;
    border: 1px solid #b8daff;
}

.option_list .option:last-child{
    margin-bottom: 0px;
}


.quiz_box footer{
    height: 60px;
    width: 100%;
    padding: 0 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* border-top: 1px solid lightgrey; */
}

.quiz_box footer .total_que span{
    display: flex;
    user-select: none;
}

footer .total_que span p{
    font-weight: 500;
    padding: 0 5px;
}

footer .total_que span p:first-child{
    padding-left: 0px;
}

footer .next_btn{
    height: 40px;
    padding: 0 13px;
    font-size: 18px;
    font-weight: 400;
    cursor: pointer;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    background: #007bff;
    border: 1px solid #007bff;
    cursor: pointer;
    /* line-height: 10px;
    opacity: 0;
    pointer-events: none;
    transform: scale(0.95); */
    transition: all 0.3s ease;
}

footer .next_btn:hover{
    background: #0263ca;
}








</style>



<body>

    <?php
if (isset($_POST['choose'])) {
    $choose = $_POST['choose'];
    echo $choose;

}


?>



    <!-- body  -->




    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand"><b>
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

                </ul>



                <form class="d-flex">
                    <button class="btn btn-outline-warning" type="submit"><i data-feather="user"></i>
                        <font size="3"><b> <?php echo $_SESSION['username'];  ?></b></font>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!--Sidebar Profile  -->




    <div class="quiz_box">
        <header>
            <div class="title">Subject : <?php echo $_SESSION['subject'];  ?></div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <?php
                if ($_SESSION['exam_time']<999) {
                    ?>
<div id="countdowntimer" class="timer_sec">00:00:00</div>
                    <?php
                }
                else {
                    ?>
                    <div class="timer_sec"><i data-feather="pause"></i></div>
                    <?php
                }
                ?>
                
            </div>
        </header>

        <section>
            <div id="load_questions"></div>
        </section>

        <footer>
            <div class="total_que">
            <span>
                <p><div id="current_que">0</div></p>
                of
                <p><div id="total_que">0</div></p>
                Questions
            </span>
            </div>
            
            <input class="next_btn" type="button" value="Next" onclick="load_next();">
        </footer>













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
        setInterval(function() {
            timer();
        }, 1000);

        function timer() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == "00:00:01") {
                        window.location = "result.php";
                    }
                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "forajax/load_timer.php", true);
            xmlhttp.send(null);
        }
        </script>


        <script type="text/javascript">
        function load_total_que() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                };
            };
            xmlhttp.open("GET", "forajax/load_total_que.php", true);
            xmlhttp.send(null);
        }

        var questionno = "1";
        load_questions(questionno);

        function load_questions(questionno) {
            document.getElementById("current_que").innerHTML = questionno;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == "over") {
                        window.location = "result.php";
                    } else {
                        document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                        load_total_que();
                    }

                };
            };
            xmlhttp.open("GET", "forajax/load_questions.php?questionno=" + questionno, true);
            xmlhttp.send(null);
        }

        function radioclick(radiovalue, questionno) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                };
            };
            xmlhttp.open("GET", "forajax/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue,
                true);
            xmlhttp.send(null);
        }


        function load_previous() {
            if (questionno == "1") {
                load_questions(questionno);
            } else {
                questionno = eval(questionno) - 1;
                load_questions(questionno);
            }
        }

        function load_next() {
            questionno = eval(questionno) + 1;
            load_questions(questionno);
        }
        </script>
</body>

</html>