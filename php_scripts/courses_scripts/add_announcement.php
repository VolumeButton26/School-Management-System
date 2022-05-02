<?php
    include('../connect.php');
    session_start();

    $course_num = $_SESSION['selected_course_number'];
    $announcement_content = $_POST['announcement-content'];

    if (isset($_POST['add-announcement'])) {
        sql("INSERT INTO announcements (Course_number, Date_posted, Announcement_content) VALUES ($course_num, CURRENT_TIMESTAMP(), '$announcement_content')");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
?>