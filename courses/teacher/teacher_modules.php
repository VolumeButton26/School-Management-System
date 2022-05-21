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
        <main id="content">
            <div id="modules" class="container-fluid p-5">
                <h1 class="text-dark">Modules</h1>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add-module-modal">Add Module</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-module-modal">Delete Module</button>
                <hr>

                <div class="modal fade" id="add-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Module</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form method="post" action="../../php_scripts/courses_scripts/modules/add_delete_module.php?course=<?php echo $_GET['course'];?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="module-num">Module Number</label>
                                        <p class="mb-1"><code>Group modules using a period.</code></p>
                                        <p class="mt-1"><code>E.g. "1.1.1" or "2.3.1"</code></p>
                                        <input type="text" name="module-num" class="form-control mb-2" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="module-name">Module Name</label>
                                        <input type="text" name="module-name" class="form-control mb-2" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="module-type">Module Type</label>
                                        <p><code>Note: Headers are used for sectioning modules. Header names should not have any periods.</code></p>
                                        <select class="form-control" name="module-type" required>
                                            <option value="Header" selected>Header</option>
                                            <option value="Lesson">Lesson</option>
                                            <option value="Assignment">Assignment</option>
                                            <option value="Quiz">Quiz</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="add-module-button" value="Submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="delete-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Module</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form method="post" action="../../php_scripts/courses_scripts/modules/add_delete_module.php?course=<?php echo $_GET['course'];?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="group-name">Module Number</label>
                                        <input type="text" name="module-num" class="form-control mb-2" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="delete-module-button" value="Submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                    $course_num = $_GET['course'];
                    $course_modules_header = sql("SELECT * FROM modules_main WHERE Course_number = $course_num AND Module_type = 'Header' ORDER BY Module_number");
                    if ($course_modules_header->num_rows > 0) {
                        while ($row_header = $course_modules_header->fetch_assoc()) {
                            echo "
                                <div class=\"card mb-3\">
                                    <div class=\"card-header bg-dark\">
                                        <a class=\"card-link text-light collapse-link\" data-toggle=\"collapse\" href=\"#module-" . $row_header["Module_number"] . "\">
                                        <img class=\"card-img-top collapse-icon\" src=\"../../icons/collapse_button.png\">
                                        Module " . $row_header["Module_number"] . ": " . $row_header["Module_name"] . "</a>
                                    </div>
                                    <div id=\"module-" . $row_header["Module_number"] . "\" class=\"collapse show\">
                                        <div class=\"card-body bg-secondary\">
                            ";

                            $module_num = $row_header["Module_number"];
                            $modules_non_header = sql("SELECT * FROM modules_main WHERE Course_number = $course_num AND NOT Module_type = 'Header' AND Module_number LIKE '$module_num%' ORDER BY Module_number");
                            if ($modules_non_header->num_rows > 0) {
                                $first = true;
                                while ($non_header_row = $modules_non_header->fetch_assoc()) {
                                    if (!$first) {
                                        echo "<hr>";
                                    }
                                    echo "<a class=\"card-link text-light\" href=\"teacher_module_";
                                    switch ($non_header_row["Module_type"]) {
                                        case "Lesson":
                                            echo "lesson";
                                            break;
                                        case "Assignment":
                                            echo "assignment";
                                            break;
                                        case "Quiz":
                                            echo "quiz";
                                            break;
                                        default:
                                            echo "Error: Module has an invalid type.";
                                    }
                                    echo ".php?course=" . $course_num . "&module_id=" . $non_header_row["Module_ID"] . "\">";
                                    if ($non_header_row["Published"]) {
                                        echo "(✓) ";
                                    }
                                    else {
                                        echo "(X) ";
                                    }
                                    echo $non_header_row["Module_number"] . " - " . $non_header_row["Module_name"] . "</a>";
                                    $first = false;
                                }
                            } 
                            echo "
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }
                ?>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>