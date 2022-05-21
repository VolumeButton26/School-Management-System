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
            <div id="module-lesson" class="container-fluid p-5">
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
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit-module-modal">Edit Lesson</button>
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
                    $content_query = sql("SELECT Content FROM modules_lessons WHERE Module_ID = $module_id");
                    if ($content_query->num_rows == 1) {
                        $content = $content_query->fetch_assoc();
                    }
                ?>

                <div class="modal fade" id="edit-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Lesson</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form method="post" action="../../php_scripts/courses_scripts/modules/edit_lesson.php?module_id=<?php echo $module_id;?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="module-content">Content</label>
                                        <textarea name="module-content" class="form-control" rows="15" required><?php echo $content["Content"];?></textarea>
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
                    <?php echo $content["Content"];?>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>