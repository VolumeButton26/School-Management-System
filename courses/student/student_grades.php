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
            <div id="grades" class="container-fluid p-5">
                <h1 class="text-dark">Grades</h1>
                <hr/>

                <div id="content">
                    <!-- get content from database -->
                    <h3>Assignments</h3>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:40%">Module</th>
                                <th style="width:20%">Due</th>
                                <th style="width:20%">Status</th>
                                <th style="width:10%">Score</th>
                                <th style="width:10%">Out Of</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $course_num = $_GET['course'];
                                $student_total_assignment_score = 0;
                                $total_assignment_score = 0;

                                $main_query = sql("SELECT Module_ID, Module_number, Module_name FROM modules_main WHERE Course_number = $course_num AND Module_type = 'Assignment' ORDER BY Module_number");
                                if ($main_query->num_rows > 0) {
                                    while ($main_row = $main_query->fetch_assoc()) {
                                        $module_id = $main_row["Module_ID"];
                                        $assignments_query = sql("SELECT Points, Due_date FROM modules_assignments WHERE Module_ID = $module_id");
                                        if ($assignments_query->num_rows == 1) {
                                            $assignments_row = $assignments_query->fetch_assoc();
                                            
                                            $submission_query = sql("SELECT Status, Score FROM student_modules_assignments WHERE ID_number = '$id' AND Module_ID = $module_id");
                                            if ($submission_query->num_rows == 1) {
                                                $submission_row = $submission_query->fetch_assoc();

                                                echo "
                                                    <tr>
                                                        <td>" . $main_row["Module_number"] . " - " . $main_row["Module_name"] . "</td>
                                                        <td>" . date('M d, Y b\y h:i A', strtotime($assignments_row["Due_date"])) . "</td>
                                                        <td>" . $submission_row["Status"] . "</td>
                                                        <td>" . $submission_row["Score"] . "</td>
                                                        <td>" . $assignments_row["Points"] . "</td>
                                                    </tr>
                                                ";

                                                $student_total_assignment_score += $submission_row["Score"];
                                            }
                                            else {
                                                echo "
                                                    <tr>
                                                        <td>" . $main_row["Module_number"] . " - " . $main_row["Module_name"] . "</td>
                                                        <td>" . date('M d, Y b\y h:i A', strtotime($assignments_row["Due_date"])) . "</td>
                                                        <td>Not Submitted</td>
                                                        <td>0</td>
                                                        <td>" . $assignments_row["Points"] . "</td>
                                                    </tr>
                                                ";
                                            }
                                            $total_assignment_score += $assignments_row["Points"];
                                        }
                                    }
                                }
                            ?>

                            <tr>
                                <th colspan="3">Total</th>
                                <td><?php echo $student_total_assignment_score; ?></td>
                                <td><?php echo $total_assignment_score; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>
                    <h3>Quizzes</h3>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:40%">Module</th>
                                <th style="width:20%">Due</th>
                                <th style="width:20%">Status</th>
                                <th style="width:10%">Score</th>
                                <th style="width:10%">Out Of</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $course_num = $_GET['course'];
                                $student_total_quiz_score = 0;
                                $total_quiz_score = 0;

                                $main_query = sql("SELECT Module_ID, Module_number, Module_name FROM modules_main WHERE Course_number = $course_num AND Module_type = 'Quiz' ORDER BY Module_number");
                                if ($main_query->num_rows > 0) {
                                    while ($main_row = $main_query->fetch_assoc()) {
                                        $module_id = $main_row["Module_ID"];
                                        $quizzes_query = sql("SELECT Points, Due_date FROM modules_quizzes_main WHERE Module_ID = $module_id");
                                        if ($quizzes_query->num_rows == 1) {
                                            $quizzes_row = $quizzes_query->fetch_assoc();
                                            
                                            $quiz_submission_query = sql("SELECT Status, Score FROM student_modules_quizzes WHERE ID_number = '$id' AND Module_ID = $module_id");
                                            if ($quiz_submission_query->num_rows == 1) {
                                                $quiz_submission_row = $quiz_submission_query->fetch_assoc();

                                                echo "
                                                    <tr>
                                                        <td>" . $main_row["Module_number"] . " - " . $main_row["Module_name"] . "</td>
                                                        <td>" . date('M d, Y b\y h:i A', strtotime($quizzes_row["Due_date"])) . "</td>
                                                        <td>" . $quiz_submission_row["Status"] . "</td>
                                                        <td>" . $quiz_submission_row["Score"] . "</td>
                                                        <td>" . $quizzes_row["Points"] . "</td>
                                                    </tr>
                                                ";

                                                $student_total_quiz_score += $quiz_submission_row["Score"];
                                            }
                                            else {
                                                echo "
                                                    <tr>
                                                        <td>" . $main_row["Module_number"] . " - " . $main_row["Module_name"] . "</td>
                                                        <td>" . date('M d, Y b\y h:i A', strtotime($quizzes_row["Due_date"])) . "</td>
                                                        <td>Not Submitted</td>
                                                        <td>0</td>
                                                        <td>" . $quizzes_row["Points"] . "</td>
                                                    </tr>
                                                ";
                                            }
                                            $total_quiz_score += $quizzes_row["Points"];
                                        }
                                    }
                                }
                            ?>

                            <tr>
                                <th colspan="3">Total</th>
                                <td><?php echo $student_total_quiz_score; ?></td>
                                <td><?php echo $total_quiz_score; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>