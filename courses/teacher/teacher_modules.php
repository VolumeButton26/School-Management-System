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
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit-module-modal">Edit Module</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-module-modal">Delete Module</button>
                <hr>

                <div class="modal fade" id="add-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Module</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form method="post" action="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="group-name">Group Name</label>
                                        <input type="text" name="group-name" class="form-control mb-2" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="num_groups">Number of Groups</label>
                                        <input type="number" name="num-groups" class="form-control mb-2" value="1" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="add-module-button" value="Submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="edit-module-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Module</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Confirm</button>
                            </div>
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

                            <div class="modal-body">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-dark">
                        <a class="card-link text-light collapse-link" data-toggle="collapse" href="#moduleOne">
                        <img class="card-img-top collapse-icon" src="../../icons/collapse_button.png">
                        Module 1: Basic Physics
                        </a>
                    </div>
                    <div id="moduleOne" class="collapse">
                        <div class="card-body bg-secondary">
                        <a class="card-link text-light" href="#">1.1</a>
                        <hr/>
                        <a class="card-link text-light" href="#">1.2</a>
                        <hr/>
                        <a class="card-link text-light" href="#">1.3</a>
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