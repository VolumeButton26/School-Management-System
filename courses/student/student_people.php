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
                <h2 class="my-3">NAME</h2>
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
                            <hr/>
                            <a href="#" class="card-link text-light">Biochemistry</a>
                            <hr/>
                            <a href="#" class="card-link text-light">Anthropology</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-1 pb-1"> 
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item"><a href="student_announcements.php" class="nav-link">Announcements</a></li>
                        <li class="nav-item"><a href="student_modules.php" class="nav-link">Modules</a></li>
                        <li class="nav-item"><a href="student_people.php" class="nav-link active">People</a></li>
                        <li class="nav-item"><a href="student_grades.php" class="nav-link">Grades</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Content -->
        <main>
            <div id="people" class="container-fluid p-5">
                <h1 class="text-dark">People</h1>
                <hr/>

                <div id="content">
                    <!-- get content from database -->
                    <a href="#student-list" class="btn btn-dark mx-auto mb-4" data-toggle="collapse" role="button"><h5 class="mb-1">Students</h5></a>
                    <a href="#group-list" class="btn btn-dark mx-auto mb-4" data-toggle="collapse" role="button"><h5 class="mb-1">Groups</h5></a>

                    <div id="accordion">
                        <div class="collapse show" id="student-list" data-parent="#accordion">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Student One</li>
                                <li class="list-group-item">Student Two</li>
                                <li class="list-group-item">Student Three</li>
                                <li class="list-group-item">Student Four</li>
                            </ul>
                        </div>
                        <div class="collapse" id="group-list" data-parent="#accordion">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <a href="#group-1" class="card-link text-light" data-toggle="collapse">Group One</a>
                                </div>
                                <div class="card-body collapse" id="group-1">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Student One</li>
                                        <li class="list-group-item">Student Two</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <a href="#group-2" class="card-link text-light" data-toggle="collapse">Group Two</a>
                                </div>
                                <div class="card-body collapse" id="group-2">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Student Three</li>
                                        <li class="list-group-item">Student Four</li>
                                    </ul>
                                </div>
                            </div>
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