<?php
    include('../connect.php');
    session_start();

    $id = $_SESSION['id'];
    $name = $_POST['course-name'];
    $course_num;

    if (isset($_POST['add-course'])) {
        sql("INSERT INTO courses (Course_name) VALUES ('$name')");
        $recent = sql("SELECT MAX(Course_number) AS Recent_Course FROM courses WHERE Course_name = '$name'");
        if ($recent->num_rows == 1) {
            while ($row = $recent->fetch_assoc()) {
                $course_num = $row["Recent_Course"];
            }
        }

        sql("INSERT INTO assigned_courses VALUES ('$id', '$course_num')");
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: settings.php");
    }
?>