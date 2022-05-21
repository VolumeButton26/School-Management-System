<?php
    include('../../connect.php');
    session_start();

    $module_id = $_GET['module_id'];
    $content = $_POST['module-content'];
    

    if (isset($_POST['edit-module-button'])) {
        sql("UPDATE modules_lessons SET Content = '$content' WHERE Module_ID = $module_id");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
?>