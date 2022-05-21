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
        <?php include('../courses_sub_sidebar_teacher.php'); ?>

        <!-- Content -->
        <main>
            <div id="grading-system" class="container-fluid p-5">
                <h1 class="text-dark">Grading System</h1>

                <div id="content">
                    <?php
                        $course_number = $_GET["course"];
                        if ($course_number != null) {
                            $course = sql("SELECT * FROM grading_system WHERE Course_number = $course_number");
                        
                            if ($course->num_rows == 1) {
                                $row = $course->fetch_assoc();
                            }
                        }
                    ?>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Assignments</td>
                                <td><?php if ($course_number != null) { echo $row["Assignments_percentage"]; } ?>%</td>
                            </tr>
                            <tr>
                                <td>Quizzes</td>
                                <td><?php if ($course_number != null) { echo $row["Quizzes_percentage"]; } ?>%</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit-grading-system-modal">Edit</button>
                    <div class="modal fade" id="edit-grading-system-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Grading System</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <form action="../../php_scripts/courses_scripts/edit_grading_system.php?course=<?php echo $_GET['course'];?>" method="post">
                                    <div class="modal-body" id="edit-grading-system-form">
                                        <div class="form-group">
                                            <label for="assignments-distribution">Assignments</label>
                                            <input type="number" name="assignments-distribution" class="form-control mb-2 edit-gs-distrib" min="0" max="100" value="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="quizzes-distribution" id="quizzes-label">Quizzes</label>
                                            <input type="number" name="quizzes-distribution" class="form-control mb-2 edit-gs-distrib" min="0" max="100" value="0" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="edit-grading-system" value="edit-grading-system" class="btn btn-dark" id="edit-grading-system">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
        <script>
            var edit_total = 100;
            var edit_inputs = document.getElementsByClassName("edit-gs-distrib");

            for (let edit_input of edit_inputs) {
                edit_input.onchange = edit_verifyTotal;
            }
            
            function edit_verifyTotal() {
                if (this.value > parseInt(this.max)) {
                    this.value = parseInt(this.max);
                } 
                else if (this.val < parseInt(this.min)) {
                    this.value = parseInt(this.min);
                }

                var edit_current = edit_available();
                for (let edit_input of edit_inputs) {
                    edit_input.max = parseInt(edit_input.value) + edit_total - edit_current;
                }
            }

            function edit_available() {
                var edit_sum = 0;
                for (let edit_input of edit_inputs) {
                    edit_sum += parseInt(edit_input.value);
                }
                return edit_sum;
            }
        </script>
    </body>
</html>