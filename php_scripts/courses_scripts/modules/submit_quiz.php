<?php
    include('../../connect.php');
    session_start();

    $student_id = $_SESSION['id'];
    $module_id = $_GET['module_id'];
    $submission_datetime = date("Y-m-d H:i:s");
    $questions = $_POST['questions'];
    $answers = $_POST['answers'];
    $no_of_questions = $_POST['no-of-questions'];
    

    if (isset($_POST['submit-quiz-button'])) {
        $module_query = sql("SELECT Points, No_of_tries FROM modules_quizzes_main WHERE Module_ID = $module_id");
        if ($module_query->num_rows == 1) {
            $module = $module_query->fetch_assoc();

            $tries = 0;
            $tried = false;
            $can_try = true;

            $check_if_tried = sql("SELECT No_of_tries FROM student_modules_quizzes WHERE ID_number = '$student_id' AND Module_ID = $module_id");
            if ($check_if_tried->num_rows > 0) {
                $check_row = $check_if_tried->fetch_assoc();
                $tried = true;
                if ($check_row["No_of_tries"] < $module["No_of_tries"]) {
                    $tries = $check_row["No_of_tries"];
                }
                else {
                    $can_try = false;
                }
            }

            if ($can_try) {
                $score = 0;
                for ($i = 1; $i < $no_of_questions; $i++) {
                    $choice_id = $answers[$i];
                    $choice_query = sql("SELECT Choice FROM modules_quizzes_choices WHERE Choice_ID = $choice_id");
                    if ($choice_query->num_rows == 1) {
                        $choice_row = $choice_query->fetch_assoc();
                        $choice = $choice_row["Choice"];
                        
                        $answer_query = sql("SELECT Answer FROM modules_quizzes_questions WHERE Question_ID = $questions[$i]");
                        if ($answer_query->num_rows == 1) {
                            $answer_row = $answer_query->fetch_assoc();

                            if ($choice == $answer_row["Answer"]) {
                                $score++;
                            }
                        }
                    }
                }
                $tries++;

                if ($tried) {
                    sql("UPDATE student_modules_quizzes SET Score = $score, Submission_date = '$submission_datetime', No_of_tries = $tries WHERE ID_number = '$student_id' AND Module_ID = $module_id");
                    for ($i = 1; $i < $no_of_questions; $i++) {
                        $choice_id = $answers[$i];
                        $choice_query = sql("SELECT Choice FROM modules_quizzes_choices WHERE Choice_ID = $choice_id");
                        if ($choice_query->num_rows == 1) {
                            $choice_row = $choice_query->fetch_assoc();
                            $choice = $choice_row["Choice"];
                            sql("UPDATE student_modules_quiz_answers SET Student_answer = '$choice' WHERE ID_number = '$student_id' AND Question_ID = $questions[$i]");
                        }
                    }
                }
                else {
                    sql("INSERT INTO student_modules_quizzes (ID_number, Module_ID, Status, Score, Submission_date, No_of_tries) VALUES ('$student_id', $module_id, 'Submitted', $score, '$submission_datetime', $tries)");
                    for ($i = 1; $i < $no_of_questions; $i++) {
                        $choice_id = $answers[$i];
                        $choice_query = sql("SELECT Choice FROM modules_quizzes_choices WHERE Choice_ID = $choice_id");
                        if ($choice_query->num_rows == 1) {
                            $choice_row = $choice_query->fetch_assoc();
                            $choice = $choice_row["Choice"];
                            sql("INSERT INTO student_modules_quiz_answers (ID_number, Question_ID, Module_ID, Student_answer) VALUES ('$student_id', $questions[$i], $module_id, '$choice')");
                        }
                    }
                }
            }
        }
        header("Location: ../../../courses/student/student_module_quiz_main.php?course=" . $_GET['course'] . "&module_id=" . $module_id);
    }

    /*
    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
    */
?>