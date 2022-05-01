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
        <title>Canvas Ripoff</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    
    <body>
        <!-- Main Sidebar -->
        <div class="bg-dark main-sidebar">
            <div class="bg-secondary text-center text-white">
                <img src="../../images/avatarSample.png" class="mt-5 rounded-circle" alt="avatar">
                <h3 class="my-3"><?php echo $_SESSION['first_name'] . " " . $_SESSION['family_name']?></h3>
                <a href="../../index.php" class="btn btn-dark mx-auto mb-4" role="button">LOGOUT</a>
            </div>
            <div class="p-3"> 
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item"><a href="student_announcements.php" class="nav-link active">Courses</a></li>
                        <li class="nav-item"><a href="../../calendar.php" class="nav-link">Calendar</a></li>
                        <li class="nav-item"><a href="../../settings.php" class="nav-link">Settings</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Courses Sub Sidebar -->
        <div class="bg-white border-right sub-sidebar">
            <div class="container pt-3 px-4">
                <!-- php script -->
                <h3 class="text-dark">Courses</h3>
                <div class="card">
                    <div class="card-header bg-dark">
                        <a class="card-link text-light" data-toggle="collapse" href="#courseDropdownMenu">Advanced Physics</a>
                    </div>
                    <div id="courseDropdownMenu" class="collapse">
                        <div class="card-body bg-secondary">
                            <a href="#" class="card-link text-light">Inverse Kinematics</a>
                            <hr>
                            <a href="#" class="card-link text-light">Biochemistry</a>
                            <hr>
                            <a href="#" class="card-link text-light">Anthropology</a>
                            <hr>
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add-course-modal">Add</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-1 pb-1"> 
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item"><a href="teacher_announcements.php" class="nav-link">Announcements</a></li>
                        <li class="nav-item"><a href="teacher_modules.php" class="nav-link">Modules</a></li>
                        <li class="nav-item"><a href="teacher_people.php" class="nav-link">People</a></li>
                        <li class="nav-item"><a href="teacher_grading_system.php" class="nav-link">Grading System</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="modal fade" id="add-course-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Course</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <form action="../../php_scripts/courses_scripts/add_course.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="course-name">Course Name</label>
                                <input type="text" name="course-name" class="form-control mb-2" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="add-course" value="add-course" class="btn btn-dark" id="add-course">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

                            <div class="modal-body">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="content">
                    <!-- get content from database -->
                    
                    <h5>Teacher Name <small>Date Time</small></h5>
                    <p>We will not be meeting tomorrow yehey</p>
                    <hr>

                    <h5>Teacher Name <small>Date Time</small></h5>
                    <p>We will be meeting tomorrow! yehey</p>
                    <hr>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>