<?php
    include('../../php_scripts/connect.php');
    session_start();

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    }
    else {
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Port</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    
    <body>
        <!-- Main Sidebar -->
        <?php include('../courses_main_sidebar.php'); ?>

        <!-- Courses Sub Sidebar -->
        <?php include('../courses_sub_sidebar_student.php'); ?>

        <!-- Content -->
        <main>
            <div id="announcements" class="container-fluid p-5">
                <?php
                    if (!isset($_GET['course'])) {
                        echo "<h1 class=\"text-dark\">Select Course</h1>";
                    }
                    else {
                        echo "
                            <h1 class=\"text-dark\">Announcements</h1>
                            <hr>
                            <div id=\"content\">
                        ";

                        $course_number = $_GET['course'];
                        $teacher = sql("SELECT ID_number FROM assigned_courses WHERE Course_number = $course_number AND ID_number LIKE 't%'");
                        if ($teacher->num_rows == 1) {
                            $teacher_row = $teacher->fetch_assoc();
                            $teacher_id = $teacher_row["ID_number"];
                        }
                        $teacher_info = sql("SELECT First_name, Family_name FROM teacher_information WHERE ID_number = '$teacher_id'");
                        if ($teacher_info->num_rows == 1) {
                            $teacher_info_row = $teacher_info->fetch_assoc();
                        }
                        $announcements = sql("SELECT Date_posted, Announcement_content FROM announcements WHERE Course_number = $course_number ORDER BY Date_posted DESC");
                        if ($announcements->num_rows > 0) {
                            while ($row = $announcements->fetch_assoc()) {
                                echo "<h5>" . $teacher_info_row["First_name"] . " " . $teacher_info_row["Family_name"] . "<small> " . $row["Date_posted"] . "</small></h5>";
                                echo "<p>" . $row["Announcement_content"] . "</p>";
                                echo "<hr>";
                            }
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>