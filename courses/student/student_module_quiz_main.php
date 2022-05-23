<?php
    date_default_timezone_set("Asia/Manila");
    include('../../php_scripts/connect.php');
    session_start();

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    }
    else {
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Port</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    
    <body>
        <!-- Main Sidebar -->
        <?php include('../courses_main_sidebar.php'); ?>

        <!-- Courses Sub Sidebar -->
        <?php include('../courses_sub_sidebar_student.php'); ?>

        <!-- Content -->
        <main id="content">
            <div id="module-lesson" class="container-fluid p-5">
                <?php
                    $module_id = $_GET['module_id'];
                    $module_query = sql("SELECT Module_number, Module_name FROM modules_main WHERE Module_ID = $module_id");
                    if ($module_query->num_rows == 1) {
                        $module = $module_query->fetch_assoc();
                    }
                ?>
                <h1 class="text-dark"><?php echo $module["Module_number"] . " - " . $module["Module_name"];?></h1>
                <hr>

                <?php
                    $quiz_query = sql("SELECT Content, Points, Start_date, Due_date, No_of_tries FROM modules_quizzes_main WHERE Module_ID = $module_id");
                    if ($quiz_query->num_rows == 1) {
                        $quiz = $quiz_query->fetch_assoc();
                    }

                    $try_query = sql("SELECT Score, Submission_date, No_of_tries FROM student_modules_quizzes WHERE ID_number = '$id' AND Module_ID = $module_id");
                    if ($try_query->num_rows > 0) {
                        $try = $try_query->fetch_assoc();
                        $tried = true;
                        $tries_left = $quiz['No_of_tries'] - $try['No_of_tries'];
                    }
                    else {
                        $tried = false;
                        $tries_left = $quiz['No_of_tries'];
                    }
                ?>

                <div id="content-main">
                    <h4 class="text-secondary">Date and Time: <span class="text-dark"><?php echo date('M d, Y, h:i A', strtotime($quiz["Start_date"])) . " - " . date('M d, Y, h:i A', strtotime($quiz["Due_date"]));?></span></h4>
                    <h4 class="text-secondary">Score: <span class="text-dark">
                    <?php 
                        if ($tried) {
                            echo $try["Score"];
                        }
                        else {
                            echo "__";
                        }
                        echo " / " . $quiz["Points"];
                    ?>
                    </span></h4>
                    <h4 class="text-secondary">No. of Tries Left: <span class="text-dark"><?php echo $tries_left;?></span></h4>
                    <hr>
                    <h4 class="text-secondary mt-4">Content:</h4>
                    <p><?php echo $quiz["Content"];?></p>
                    <hr>
                    <?php 
                        $can_take = false;
                        if (date('M d, Y, h:i A', strtotime($quiz["Start_date"])) < date('M d, Y, h:i A') && date('M d, Y, h:i A') < date('M d, Y, h:i A', strtotime($quiz["Due_date"])) && $tries_left != 0) {
                            $can_take = true;
                        }

                        if ($can_take) {
                            echo "<a href=\"student_module_quiz_answer_sheet.php?course=" . $_GET['course'] . "&module_id=" . $_GET['module_id'] . "\" class=\"btn btn-dark\" role=\"button\">Start Quiz</a>";
                        }
                        else {
                            echo "<button class=\"btn btn-dark\" disabled>Start Quiz</button>";
                        }
                    ?>
                    <br>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>