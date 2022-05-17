<?php
    include('../connect.php');
    session_start();

    $student_id = $_POST['student-id-search'];
    $course_num = $_GET['course'];

    if (isset($_POST['add-student-button'])) {
        $check_if_existing = sql("SELECT ID_number FROM student_information WHERE ID_number = '$student_id'");
        if ($check_if_existing->num_rows > 0) {
            $check_if_enrolled = sql("SELECT ID_number FROM assigned_courses WHERE ID_number = '$student_id' AND Course_number = $course_num");
            if ($check_if_enrolled->num_rows > 0) {
                echo "Student is already enrolled in this course.";
            }
            else {
                sql("INSERT INTO assigned_courses VALUES ('$student_id', $course_num)");
                echo "Student enrolled.";
            }
        }
        else {
            echo "Student does not exist.";
        }
    }

    if (isset($_POST['delete-student-button'])) {
        $check_if_existing = sql("SELECT ID_number FROM student_information WHERE ID_number = '$student_id'");
        if ($check_if_existing->num_rows > 0) {
            $check_if_enrolled = sql("SELECT * FROM assigned_courses WHERE ID_number = '$student_id' AND Course_number = $course_num");
            if ($check_if_enrolled->num_rows > 0) {
                sql("DELETE FROM assigned_courses WHERE ID_number = '$student_id'");
                echo "Student deleted.";
            }
            else {
                echo "Student is not enrolled in this course.";
            }
        }
        else {
            echo "Student does not exist.";
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