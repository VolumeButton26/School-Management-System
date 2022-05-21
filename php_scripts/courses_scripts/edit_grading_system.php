<?php
    include('../connect.php');
    session_start();

    $id = $_SESSION['id'];
    $assignments = $_POST['assignments-distribution'];
    $quizzes = $_POST['quizzes-distribution'];
    $course_num = $_GET['course'];;

    if (isset($_POST['edit-grading-system'])) {
        sql("UPDATE grading_system SET Assignments_percentage = $assignments, Quizzes_percentage = $quizzes WHERE Course_number = $course_num");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
?>