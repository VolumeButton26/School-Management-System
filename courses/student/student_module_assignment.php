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
        <main id="content">
            <div id="module-lesson" class="container-fluid p-5">
                <?php
                    $module_id = $_GET['module_id'];
                    $module_query = sql("SELECT Module_number, Module_name FROM modules_main WHERE Module_ID = $module_id");
                    if ($module_query->num_rows == 1) {
                        $module = $module_query->fetch_assoc();
                    }
                ?>
                <h1 class="text-dark"><?php echo $module["Module_number"] . " - " . $module["Module_name"];?></h1>
                <hr>

                <?php
                    $assignment_query = sql("SELECT Content, Points, Due_date, No_of_submissions, Answer FROM modules_assignments WHERE Module_ID = $module_id");
                    if ($assignment_query->num_rows == 1) {
                        $assignment = $assignment_query->fetch_assoc();
                    }

                    $submission_query = sql("SELECT Score, Submission_date, No_of_submissions, Student_answer FROM student_modules_assignments WHERE ID_number = '$id' AND Module_ID = $module_id");
                    if ($submission_query->num_rows > 0) {
                        $submission = $submission_query->fetch_assoc();
                        $submitted = true;
                        $submissions_left = $assignment['No_of_submissions'] - $submission['No_of_submissions'];
                    }
                    else {
                        $submitted = false;
                        $submissions_left = $assignment['No_of_submissions'];
                    }
                ?>

                <div id="content-main">
                    <h4 class="text-secondary">Due Date: <span class="text-dark"><?php echo date('M d, Y, h:i A', strtotime($assignment["Due_date"]));?></span></h4>
                    <h4 class="text-secondary">Score: <span class="text-dark">
                    <?php 
                        if ($submitted) {
                            echo $submission["Score"];
                        }
                        else {
                            echo "__";
                        }
                        echo " / " . $assignment["Points"];
                    ?>
                    </span></h4>
                    <h4 class="text-secondary">No. of Submissions Left: <span class="text-dark"><?php echo $submissions_left;?></span></h4>
                    <h4 class="text-secondary mt-4">Content:</h4>
                    <p><?php echo $assignment["Content"];?></p>
                    <h4 class="text-secondary mt-4">Answer:</h4>
                    <form method="post" action="../../php_scripts/courses_scripts/modules/submit_assignment.php?course=<?php echo $_GET['course'] . "&module_id=" . $_GET['module_id'] ?>">
                        <div class="form-group">
                            <textarea name="student-answer" class="form-control" rows="5" required <?php if ($submissions_left == 0) {echo "disabled";} ?>></textarea>
                        </div>
                        <button type="submit" name="submit-assignment-button" value="Submit" class="btn btn-dark" <?php if ($submissions_left == 0) {echo "disabled";} ?>>Submit</button>
                    </form>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>