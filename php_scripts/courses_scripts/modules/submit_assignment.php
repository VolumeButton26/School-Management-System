<?php
    include('../../connect.php');
    session_start();

    $student_id = $_SESSION['id'];
    $module_id = $_GET['module_id'];
    $submission_date = date("Y-m-d H:i:s");
    $student_answer = $_POST['student-answer'];
    $student_answer = addslashes($student_answer);
    

    if (isset($_POST['submit-assignment-button'])) {
        $answer_query = sql("SELECT Points, Answer, No_of_submissions FROM modules_assignments WHERE Module_ID = $module_id");
        if ($answer_query->num_rows == 1) {
            $answer = $answer_query->fetch_assoc();

            $submissions = 0;
            $submitted = false;
            $can_submit = true;

            $check_if_submitted = sql("SELECT No_of_submissions FROM student_modules_assignments WHERE ID_number = '$student_id' AND Module_ID = $module_id");
            if ($check_if_submitted->num_rows > 0) {
                $check_row = $check_if_submitted->fetch_assoc();
                $submitted = true;
                if ($check_row["No_of_submissions"] < $answer["No_of_submissions"]) {
                    $submissions = $check_row["No_of_submissions"];
                }
                else {
                    $can_submit = false;
                }
            }

            if ($can_submit) {
                if ($student_answer == $answer["Answer"]) {
                    $score = $answer["Points"];
                }
                else {
                    $score = 0;
                }
                $submissions++;

                if ($submitted) {
                    sql("UPDATE student_modules_assignments SET Score = $score, Submission_date = '$submission_date', No_of_submissions = $submissions, Student_answer = '$student_answer' WHERE ID_number = '$student_id' AND Module_ID = $module_id");
                }
                else {
                    sql("INSERT INTO student_modules_assignments (ID_number, Module_ID, Status, Score, Submission_date, No_of_submissions, Student_answer) VALUES ('$student_id', $module_id, 'Submitted', $score, '$submission_date', $submissions, '$student_answer')");
                }
            }
        }
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
?>