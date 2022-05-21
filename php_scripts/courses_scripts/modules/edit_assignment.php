<?php
    include('../../connect.php');
    session_start();

    $module_id = $_GET['module_id'];
    $content = $_POST['module-content'];
    $points = $_POST['points'];
    $due_date = strtotime($_POST['due-date']);
    $due_date_formatted = date("Y-m-d H:i:s", $due_date);
    $no_of_submissions = $_POST['no-of-submissions'];
    $answer = $_POST['answer'];
    

    if (isset($_POST['edit-module-button'])) {
        sql("UPDATE modules_assignments SET Content = '$content', Points = $points, Due_date = '$due_date_formatted', No_of_submissions = $no_of_submissions, Answer = '$answer' WHERE Module_ID = $module_id");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
?>