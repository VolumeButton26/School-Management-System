<?php
    include('../../connect.php');
    session_start();

    $module_id = $_GET['module_id'];

    if (isset($_POST['publish-module-button'])) {
        sql("UPDATE modules_main SET Published = 1 WHERE Module_ID = $module_id");
    }

    if (isset($_POST['unpublish-module-button'])) {
        sql("UPDATE modules_main SET Published = 0 WHERE Module_ID = $module_id");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: ../../courses/teacher/teacher_announcements.php");
    }
?>