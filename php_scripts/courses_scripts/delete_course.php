<?php
    include('../connect.php');
    session_start();

    $id = $_SESSION['id'];
    $name = $_POST['course-name'];
    $course_num;

    if (isset($_POST['delete-course'])) {
        $recent = sql("SELECT Course_number FROM courses WHERE Course_name = '$name'");
        if ($recent->num_rows == 1) {
            while ($row = $recent->fetch_assoc()) {
                $course_num = $row["Course_number"];
            }
        }
        sql("DELETE FROM assigned_courses WHERE Course_number = $course_num");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php.php");
    }
?>