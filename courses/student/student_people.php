<?php
    date_default_timezone_set("Asia/Manila");
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
            <div id="people" class="container-fluid p-5">
                <h1 class="text-dark">People</h1>
                <hr/>

                <div id="content">
                    <a href="#student-list" class="btn btn-dark mx-auto" data-toggle="collapse" role="button"><h5 class="mb-1">Students</h5></a>
                    <a href="#group-list" class="btn btn-dark mx-auto" data-toggle="collapse" role="button"><h5 class="mb-1">Group</h5></a>

                    <div id="accordion">
                        <div class="collapse show" id="student-list" data-parent="#accordion">
                            <?php
                                $course_number = $_GET['course'];
                                $get_course_name = "SELECT Course_name FROM courses WHERE Course_number = $course_number";
                                $result = sql($get_course_name);
                                if ($result->num_rows == 1) {
                                    $row = $result->fetch_assoc();
                                    $course_name = $row["Course_name"];
                                }
                            ?>
                            <hr>
                            <div class="list-group list-group-flush">
                                <?php
                                    $classlist = sql("SELECT ID_number FROM assigned_courses WHERE Course_number = $course_number");
                                    if ($classlist->num_rows > 0) {
                                        while ($row = $classlist->fetch_assoc()) {
                                            $id_number = $row["ID_number"];
                                            $student = sql("SELECT ID_number, Family_name, First_name, Middle_name FROM student_information WHERE ID_number = '$id_number'");
                                            if ($student->num_rows == 1) {
                                                $student_row = $student->fetch_assoc();
                                                echo "<a href=\"#\" class=\"list-group-item list-group-item-action\">" . $student_row["First_name"] . " " . $student_row["Middle_name"] . " " . $student_row["Family_name"] . "</a>";
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <hr>
                        </div>

                        <div class="collapse" id="group-list" data-parent="#accordion">
                            <hr>
                            <?php
                                $groups = sql("SELECT Group_ID, Group_name, Group_number FROM groups WHERE Course_number = $course_number ORDER BY Group_ID");
                                if ($groups->num_rows > 0) {
                                    $link_count = 1;
                                    while ($row = $groups->fetch_assoc()) {
                                        echo "
                                            <div class=\"card mb-2\">
                                                <div class=\"card-header bg-secondary\">
                                                    <a href=\"#group-" . $link_count . "\" class=\"card-link text-light\" data-toggle=\"collapse\">" . $row["Group_name"] . " - " . $row["Group_number"] . "</a>
                                                </div>
                                                <div class=\"collapse\" id=\"group-" . $link_count . "\">
                                                    <div class=\"card-body\">
                                                        <ul class=\"list-group list-group-flush\">";

                                        $group_id = $row["Group_ID"];
                                        $students = sql("SELECT ID_number FROM student_groups WHERE Group_ID = $group_id");
                                        if ($students->num_rows > 0) {
                                            while ($student_row = $students->fetch_assoc()) {
                                                $student_id = $student_row["ID_number"];
                                                $student = sql("SELECT First_name, Family_name FROM student_information WHERE ID_number = '$student_id'");
                                                if ($student->num_rows == 1) {
                                                    $student_data = $student->fetch_assoc();
                                                    echo "<li class=\"list-group-item\">" . $student_data["First_name"] . " " . $student_data["Family_name"] . "</li>";
                                                }
                                            }
                                        }

                                        echo "
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                        $link_count++;
                                    }
                                }
                            ?>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>