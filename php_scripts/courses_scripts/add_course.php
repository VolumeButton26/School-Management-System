<?php
    include('../connect.php');
    session_start();

    $id = $_SESSION['id'];
    $name = $_POST['course-name'];
    $name = addslashes($name);
    $assignments = $_POST['assignments-distribution'];
    $quizzes = $_POST['quizzes-distribution'];
    $course_num;

    if (isset($_POST['add-course'])) {
        $course_availability_check = sql("SELECT Course_name FROM courses WHERE Course_name = '$name'");
        if ($course_availability_check->num_rows <= 0) {
            sql("INSERT INTO courses (Course_name) VALUES ('$name')");
            $recent = sql("SELECT MAX(Course_number) AS Recent_Course FROM courses WHERE Course_name = '$name'");
            if ($recent->num_rows == 1) {
                while ($row = $recent->fetch_assoc()) {
                    $course_num = $row["Recent_Course"];
                }
            }
            sql("INSERT INTO assigned_courses VALUES ('$id', '$course_num')");
            sql("INSERT INTO grading_system VALUES ('$course_num', $assignments, $quizzes)");
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