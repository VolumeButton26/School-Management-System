<?php
    include('../../connect.php');
    session_start();

    $course_num = $_GET['course'];
    $module_num = $_POST['module-num'];
    

    if (isset($_POST['add-module-button'])) {
        $module_name = $_POST['module-name'];
        $module_name = addslashes($module_name);
        $module_type = $_POST['module-type'];
        
        $check_if_module_exists = sql("SELECT Module_ID, Module_type FROM modules_main WHERE Course_number = $course_num AND Module_number = '$module_num'");
        if ($check_if_module_exists->num_rows != 1) {
            if ($module_type == "Header") {
                sql("INSERT INTO modules_main (Course_number, Module_number, Module_name, Module_type, Published) VALUES ($course_num, '$module_num', '$module_name', '$module_type', 1)");
            }
            else {
                sql("INSERT INTO modules_main (Course_number, Module_number, Module_name, Module_type, Published) VALUES ($course_num, '$module_num', '$module_name', '$module_type', 0)");
            }
            $module = sql("SELECT Module_ID FROM modules_main WHERE Course_number = $course_num AND Module_number = '$module_num'");
            if ($module->num_rows == 1) {
                $row = $module->fetch_assoc();
                $module_id = $row["Module_ID"];
            }

            if ($module_type == "Lesson") {
                sql("INSERT INTO modules_lessons (Module_ID) VALUES ($module_id)");
            }
            else if ($module_type == "Assignment") {
                sql("INSERT INTO modules_assignments (Module_ID) VALUES ($module_id)");
            }
            else if ($module_type == "Quiz") {
                sql("INSERT INTO modules_quizzes_main (Module_ID) VALUES ($module_id)");
            }
        }
        else {
            echo "module already exists";
        }
    }

    if (isset($_POST['delete-module-button'])) {
        $check_if_module_exists = sql("SELECT Module_ID, Module_type FROM modules_main WHERE Course_number = $course_num AND Module_number = '$module_num'");
        if ($check_if_module_exists->num_rows == 1) {
            $module = $check_if_module_exists->fetch_assoc();
            $module_id = $module["Module_ID"];
            sql("DELETE FROM modules_main WHERE Module_ID = $module_id");

            if ($module["Module_type"] == "Header") {
                // DELETE ALL MODULES UNDER THIS HEADER
            }

            if ($module["Module_type"] == "Lesson") {
                sql("DELETE FROM modules_lessons WHERE Module_ID = $module_id");
                sql("DELETE FROM student_modules_lessons WHERE Module_ID = $module_id");
            }
            else if ($module["Module_type"] == "Assignment") {
                sql("DELETE FROM modules_assignments WHERE Module_ID = $module_id");
                sql("DELETE FROM student_modules_assignments WHERE Module_ID = $module_id");
            }
            else if ($module["Module_type"] == "Quiz") {
                sql("DELETE FROM modules_quizzes_main WHERE Module_ID = $module_id");
                $questions = sql("SELECT Question_ID FROM modules_quizzes_questions WHERE Module_ID = $module_id");
                if ($questions->num_rows > 0) {
                    while ($row = $questions->fetch_assoc()) {
                        $question_id = $row["Question_ID"];
                        sql("DELETE FROM modules_quizzes_choices WHERE Question_ID = $question_id");
                    }
                }
                sql("DELETE FROM modules_quizzes_questions WHERE Module_ID = $module_id");
                sql("DELETE FROM student_modules_quizzes WHERE Module_ID = $module_id");
                sql("DELETE FROM student_modules_quiz_answers WHERE Module_ID = $module_id");
            }
        }
        else {
            echo "module does not exist";
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