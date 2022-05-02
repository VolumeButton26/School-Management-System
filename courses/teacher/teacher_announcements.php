<?php
    include('../../php_scripts/connect.php');
    session_start();

    $id = $_SESSION['id'];
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
        <?php include('../../main_sidebar.php'); ?>

        <!-- Courses Sub Sidebar -->
        <?php include('../courses_sub_sidebar_teacher.php'); ?>

        <!-- Content -->
        <main>
            <div id="announcements" class="container-fluid p-5">
                <h1 class="text-dark">Announcements</h1>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#announcement-modal">Add Announcement</button>
                <hr>

                <div class="modal fade" id="announcement-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Announcement</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form action="../../php_scripts/courses_scripts/add_announcement.php" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <textarea name="announcement-content" value="announcement-content" class="form-control" rows="5" id="announcement-content"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="add-announcement" value="add-announcement" class="btn btn-dark" id="add-announcement">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div id="content">
                    <?php
                        $course_number = $_SESSION["selected_course_number"];
                        $announcements = sql("SELECT Date_posted, Announcement_content FROM announcements WHERE Course_number = $course_number ORDER BY Date_posted DESC");
                        
                        if ($announcements->num_rows > 0) {
                            while ($row = $announcements->fetch_assoc()) {
                                echo "<h5>" . $_SESSION['first_name'] . " " . $_SESSION['family_name'] . "<small> " . $row["Date_posted"] . "</small></h5>";
                                echo "<p>" . $row["Announcement_content"] . "</p>";
                                echo "<hr>";
                            }
                        }
                    ?>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>