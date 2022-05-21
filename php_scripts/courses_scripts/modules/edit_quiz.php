<?php
    include('../../connect.php');
    session_start();

    $module_id = $_GET['module_id'];
    $content = $_POST['module-content'];
    $points = $_POST['points'];
    $start_date = strtotime($_POST['start-date']);
    $start_date_formatted = date("Y-m-d H:i:s", $start_date);
    $due_date = strtotime($_POST['due-date']);
    $due_date_formatted = date("Y-m-d H:i:s", $due_date);
    $no_of_tries = $_POST['no-of-tries'];
    
    if (isset($_POST['edit-module-button'])) {
        sql("UPDATE modules_quizzes_main SET Content = '$content', Points = $points, Start_date = '$start_date_formatted', Due_date = '$due_date_formatted', No_of_tries = $no_of_tries WHERE Module_ID = $module_id");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
?>