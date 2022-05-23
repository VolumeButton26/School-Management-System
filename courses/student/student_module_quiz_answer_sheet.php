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
                    <h4 class="text-secondary mt-4">Content:</h4>
                    <p><?php echo $quiz["Content"];?></p>
                    <hr>

                    <form method="post" action="../../php_scripts/courses_scripts/modules/submit_quiz.php?course=<?php echo $_GET['course'] . "&module_id=" . $_GET['module_id'] ?>">
                        <?php
                            $questions_query = sql("SELECT Question_ID, Question FROM modules_quizzes_questions WHERE Module_ID = $module_id ORDER BY Question_ID");
                            if ($questions_query->num_rows > 0) {
                                $question_counter = 1;
                                while ($question = $questions_query->fetch_assoc()) {
                                    echo "<h6>Question " . $question_counter . "</h6>";
                                    echo "<h5>" . $question["Question"] . "</h5>";
                                    
                                    $question_id = $question["Question_ID"];
                                    $choices_query = sql("SELECT Choice_ID, Choice FROM modules_quizzes_choices WHERE Question_ID = $question_id ORDER BY Choice_ID");
                                    if ($choices_query->num_rows == 4) {
                                        $choice_counter = 1;
                                        while ($choice = $choices_query->fetch_assoc()) {
                                            echo "
                                                <input type=\"hidden\" name=\"questions[" . $question_counter . "]\" value=\"" . $question_id . "\">
                                                <div class=\"form-check\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"radio\" class=\"form-check-input\" name=\"answers[" . $question_counter . "]\" value=\"" . $choice["Choice_ID"] . "\">
                                            ";

                                            switch ($choice_counter) {
                                                case 1:
                                                    echo "A";
                                                    break;
                                                case 2:
                                                    echo "B";
                                                    break;
                                                case 3:
                                                    echo "C";
                                                    break;
                                                case 4:
                                                    echo "D";
                                                    break;
                                                default:
                                                    echo "A";
                                            }

                                            echo ". " . $choice["Choice"] . "
                                                    </label>
                                                </div>
                                            ";
                                            $choice_counter++;
                                        }
                                    }
                                    echo "<hr>";
                                    $question_counter++;
                                }
                            }
                            echo "<input type=\"hidden\" name=\"no-of-questions\" value=\"" . $question_counter . "\">";
                        ?>
                        <button type="submit" name="submit-quiz-button" value="Submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>