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
            <div id="module-quiz" class="container-fluid p-5">
                <?php
                    $module_id = $_GET['module_id'];
                    $module_query = sql("SELECT Module_number, Module_name, Published FROM modules_main WHERE Module_ID = $module_id");
                    if ($module_query->num_rows == 1) {
                        $module = $module_query->fetch_assoc();
                    }
                ?>
                <h1 class="text-dark"><?php echo $module["Module_number"] . " - " . $module["Module_name"];?></h1>
                <?php
                    if (!$module["Published"]) {
                        echo "<button type=\"button\" class=\"btn btn-danger mb-2\" data-toggle=\"modal\" data-target=\"#publish-module-modal\">(✓) Publish Module</button>";
                    }
                    else {
                        echo "<button type=\"button\" class=\"btn btn-danger mb-2\" data-toggle=\"modal\" data-target=\"#unpublish-module-modal\">(X) Unpublish Module</button>";
                    }
                ?>
                <br>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit-module-modal">Edit Quiz</button>
                <hr>

                <div class="modal fade" id="publish-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Publish Module</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to publish this module?
                            </div>
                            <form method="post" action="../../php_scripts/courses_scripts/modules/pub_unpub_module.php?module_id=<?php echo $module_id;?>">
                                <div class="modal-footer">
                                    <input type="hidden" name="confirm-publish" value="Confirm">
                                    <button type="submit" name="publish-module-button" value="Confirm" class="btn btn-danger">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="unpublish-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Unpublish Module</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to unpublish this module?
                            </div>
                            <form method="post" action="../../php_scripts/courses_scripts/modules/pub_unpub_module.php?module_id=<?php echo $module_id;?>">
                                <div class="modal-footer">
                                    <input type="hidden" name="confirm-unpublish" value="Confirm">
                                    <button type="submit" name="unpublish-module-button" value="Confirm" class="btn btn-danger">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                    $quiz_query = sql("SELECT Content, Points, Start_date, Due_date, No_of_tries FROM modules_quizzes_main WHERE Module_ID = $module_id");
                    if ($quiz_query->num_rows == 1) {
                        $quiz = $quiz_query->fetch_assoc();
                    }
                ?>

                <div class="modal fade" id="edit-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Quiz</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form method="post" action="../../php_scripts/courses_scripts/modules/edit_quiz.php?module_id=<?php echo $module_id;?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="module-content">Content</label>
                                        <textarea name="module-content" class="form-control" rows="5" required><?php echo $quiz["Content"];?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="points">Points</label>
                                        <input type="number" class="form-control" name="points" value="<?php echo $quiz["Points"];?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="start-date">Start Date</label>
                                        <input type="datetime-local" class="form-control" name="start-date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($quiz["Start_date"]));?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="due-date">Due Date</label>
                                        <input type="datetime-local" class="form-control" name="due-date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($quiz["Due_date"]));?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no-of-tries">No. of Tries</label>
                                        <input type="number" class="form-control" name="no-of-tries" value="<?php echo $quiz["No_of_tries"];?>" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="edit-module-button" value="Submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="content-main">
                    <h4 class="text-secondary">Date and Time: <span class="text-dark"><?php echo date('M d, Y, h:i A', strtotime($quiz["Start_date"]));?> - <?php echo date('M d, Y, h:i A', strtotime($quiz["Due_date"]));?></span></h4>
                    <h4 class="text-secondary">Points: <span class="text-dark"><?php echo $quiz["Points"];?></span></h4>
                    <h4 class="text-secondary">No. of Tries: <span class="text-dark"><?php echo $quiz["No_of_tries"];?></span></h4>
                    <hr>
                    <h4 class="text-secondary">Content:</h4>
                    <p><?php echo $quiz["Content"];?></p>
                    <hr>
                    <h4 class="text-secondary">Questions:<h4>
                    <button type="button" class="btn btn-dark mb-3" data-toggle="modal" data-target="#add-question-modal">Add Question</button>
                    <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#delete-question-modal">Delete Question</button>
                      
                    <?php
                        
                        $questions_query = sql("SELECT * FROM modules_quizzes_questions WHERE Module_ID = $module_id");
                        if ($questions_query->num_rows > 0) {
                            while ($row = $questions_query->fetch_assoc()) {
                                $question_id = $row["Question_ID"];
                                echo "
                                    <h6>ID: " . $question_id . "</h6>
                                    <h5>" . $row["Question"] . "</h5>
                                ";

                                $choices_query = sql("SELECT Choice FROM modules_quizzes_choices WHERE Question_ID = $question_id");
                                if ($choices_query->num_rows == 4) {
                                    $counter = 1;
                                    while ($choice_row = $choices_query->fetch_assoc()) {
                                        echo "<p class=\"my-2\">";
                                        switch ($counter) {
                                            case 1:
                                                echo "A";
                                                break;
                                            case 2:
                                                echo "B";
                                                break;
                                            case 3:
                                                echo "C";
                                                break;
                                            case 4:
                                                echo "D";
                                                break;
                                            default:
                                                echo "Invalid";
                                        }
                                        echo ". " . $choice_row["Choice"] . "</p>";
                                        $counter++;
                                    }
                                }
                                echo "
                                    <h5>Answer: " . $row["Answer"] . "</h5>
                                    <br>
                                ";
                            }
                        }
                    ?>
                </div>

                <div class="modal fade" id="add-question-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Question</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form method="post" action="../../php_scripts/courses_scripts/modules/add_delete_question.php?module_id=<?php echo $module_id;?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="question">Question</label>
                                        <textarea name="question" class="form-control" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="choice-A">Choice A</label>
                                        <input type="text" name="choice-A" class="form-control" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="choice-A">Choice B</label>
                                        <input type="text" name="choice-B" class="form-control" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="choice-A">Choice C</label>
                                        <input type="text" name="choice-C" class="form-control" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="choice-A">Choice D</label>
                                        <input type="text" name="choice-D" class="form-control" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">Answer</label>
                                        <p><code>Note: Type in the answer itself, not the choice letter.</code></p>
                                        <input type="text" name="answer" class="form-control" rows="5" required></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="add-question-button" value="Submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="delete-question-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Question</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form method="post" action="../../php_scripts/courses_scripts/modules/add_delete_question.php?module_id=<?php echo $module_id;?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="question-id">Question ID</label>
                                        <input type="text" name="question-id" class="form-control" required></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="delete-question-button" value="Delete" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
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