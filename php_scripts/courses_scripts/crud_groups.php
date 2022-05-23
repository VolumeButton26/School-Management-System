<?php
    include('../connect.php');
    session_start();

    $course_num = $_GET['course'];
    $group_name = $_POST['group-name'];
    $group_name = addslashes($group_name);
    $group_num = $_POST['group-num'];

    if (isset($_POST['add-group-button'])) {
        $num_groups = $_POST['num-groups'];
        $check_if_group_exists_in_course = sql("SELECT Group_name FROM groups WHERE Course_number = $course_num AND Group_name = '$group_name'");
        if ($check_if_group_exists_in_course->num_rows > 0) {
            echo "Group name is already taken.";
        }
        else {
            for ($i = 1; $i <= $num_groups; $i++) {
                sql("INSERT INTO groups (Course_number, Group_name, Group_number) VALUES ('$course_num', '$group_name', $i)");
            }
            echo "Added " . $num_groups . " groups.";
        }
    }

    if (isset($_POST['edit-group-add-button'])) {
        $student_id = $_POST['student-id-search'];
        $check_if_enrolled = sql("SELECT ID_number FROM assigned_courses WHERE ID_number = '$student_id' AND Course_number = $course_num");
        if ($check_if_enrolled->num_rows > 0) {
            $group_id = sql("SELECT Group_ID FROM groups WHERE Course_number = $course_num AND Group_name = '$group_name' AND Group_number = $group_num");
            if ($group_id->num_rows == 1) {
                $result = $group_id->fetch_assoc();
                $id = $result["Group_ID"];
                $check_if_in_group = sql("SELECT ID_number FROM student_groups WHERE ID_number = '$student_id' AND Group_ID = $id");
                if ($check_if_in_group->num_rows <= 0) {
                    sql("INSERT INTO student_groups VALUES ('$student_id', '$id')");
                }
            }
        }
    }

    if (isset($_POST['edit-group-delete-button'])) {
        $student_id = $_POST['student-id-search'];
        $check_if_enrolled = sql("SELECT ID_number FROM assigned_courses WHERE ID_number = '$student_id' AND Course_number = $course_num");
        if ($check_if_enrolled->num_rows > 0) {
            $group_id = sql("SELECT Group_ID FROM groups WHERE Course_number = $course_num AND Group_name = '$group_name' AND Group_number = $group_num");
            if ($group_id->num_rows == 1) {
                $result = $group_id->fetch_assoc();
                $id = $result["Group_ID"];
                $check_if_in_group = sql("SELECT ID_number FROM student_groups WHERE ID_number = '$student_id' AND Group_ID = $id");
                if ($check_if_in_group->num_rows > 0) {
                    sql("DELETE FROM student_groups WHERE ID_number = '$student_id' AND Group_ID = $id");
                }
            }
        }
    }

    if (isset($_POST['delete-group-button'])) {
        if (isset($_POST['all-groups'])) {
            $check_if_group_exists_in_course = sql("SELECT Group_name FROM groups WHERE Course_number = $course_num AND Group_name = '$group_name'");
            if ($check_if_group_exists_in_course->num_rows > 0) {
                sql("DELETE FROM groups WHERE Course_number = $course_num AND Group_name = '$group_name'");
            }
            else {
                echo "Group name does not exist.";
            }
        }
        else {
            $check_if_group_exists_in_course = sql("SELECT Group_name FROM groups WHERE Course_number = $course_num AND Group_name = '$group_name'");
            if ($check_if_group_exists_in_course->num_rows > 0) {
                sql("DELETE FROM groups WHERE Course_number = $course_num AND Group_name = '$group_name' AND Group_number = $group_num");
            }
            else {
                echo "Group name does not exist.";
            }
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