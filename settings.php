<?php
    include('php_scripts/connect.php');
    session_start();

    $destination = $_SESSION["role"] == "Student" ? "student/student_announcements.php" : "teacher/teacher_announcements.php";
?>
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
                <h3 class="my-3"><?php echo $_SESSION['first_name'] . " " . $_SESSION['family_name']?></h3>
                <a href="index.php" class="btn btn-dark mx-auto mb-4" role="button">LOGOUT</a>
            </div>
            <div class="p-3"> 
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item"><a href="courses/<?php echo $destination ?>" class="nav-link">Courses</a></li>
                        <li class="nav-item"><a href="calendar.php" class="nav-link">Calendar</a></li>
                        <li class="nav-item"><a href="settings.php" class="nav-link active">Settings</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Content -->
        <main style="margin-left:240px" id="content">
            <div id="settings" class="container-fluid p-5">
                <h1 class="text-dark">Settings</h1>

                <hr>
                <h3>Change password:</h3>
                <form action="php_scripts/change_password.php" method="post">
                    <div class="form-group">
                        <label for="old-password">Old password</label>
                        <div class="col-sm-2 p-0">
                            <input type="password" name="old-password" class="form-control" id="old-password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-password">New password</label>
                        <div class="col-sm-2 p-0">
                            <input type="password" name="password" class="form-control" id="password" onkeyup="validatePasswordMatch()" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm-new-password">Confirm New password</label>
                        <div class="col-sm-2 p-0">
                            <input type="password" name="confirm-password" class="form-control" id="confirm-password" onkeyup="validatePasswordMatch()" required>
                        </div>
                    </div>
                    <p id="password-validation-message"></p>
                    <button type="submit" name="update" value="Update" id="submit" class="btn btn-dark" disabled>Update</button>
                </form>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
        <script src="js_scripts/register_checks.js"></script>
    </body>
</html>