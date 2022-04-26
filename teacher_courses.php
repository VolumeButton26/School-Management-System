<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Canvas Ripoff</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    <body>
        <!-- Main Sidebar -->
        <div class="bg-dark main-sidebar">
            <div class="bg-secondary text-center text-white">
                <img src="images/avatarSample.png" class="mt-5 rounded-circle" alt="avatar">
                <h2 class="my-3">NAME</h2>
                <a href="index.php" class="btn btn-dark mx-auto mb-4" role="button">LOGOUT</a>
            </div>
            <div class="p-3"> 
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item"><a href="#" class="nav-link active">Courses</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Calendar</a></li>
                        <li class="nav-item"><a href="settings.php" class="nav-link">Settings</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Courses Sub Sidebar -->
        <div class="bg-white border-right sub-sidebar">
            <div class="container pt-3 px-4">
                <!-- php script -->
                <div class="card">
                    <div class="card-header bg-dark">
                        <a class="card-link text-light collapse-link" data-toggle="collapse" href="#courseDropdownMenu">
                        Advanced Physics
                        </a>
                    </div>
                    <div id="courseDropdownMenu" class="collapse">
                        <div class="card-body bg-secondary">
                            <a class="card-link text-light" href="#">Inverse Kinematics</a>
                            <hr/>
                            <a class="card-link text-light" href="#">Biochemistry</a>
                            <hr/>
                            <a class="card-link text-light" href="#">Anthropology</a>
                            <hr/>
                            <button type="" class="btn btn-dark">Add</button>
                            <button type="" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-1 pb-1"> 
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item"><a href="#" class="nav-link">Announcements</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Modules</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">People</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Grading System</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Content -->
        <main id="content">
            <div id="grading-system" class="container-fluid p-5">
                <h1 class="text-dark">Grading System</h1>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Assignments</td>
                            <td>30%</td>
                        </tr>
                        <tr>
                            <td>Quizzes</td>
                            <td>50%</td>
                        </tr>
                    </tbody>
                </table>
                <button type="" class="btn btn-dark">Edit</button>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
        <script src="scripts/scripts.js"></script>
    </body>
</html>