<div class="bg-dark main-sidebar">
    <div class="bg-secondary text-center text-white">
        <img src="../../images/avatarSample.png" class="mt-5 rounded-circle" alt="avatar">
        <h3 class="my-3"><?php echo $_SESSION['first_name'] . " " . $_SESSION['family_name']?></h3>
        <a href="../../index.php" class="btn btn-dark mx-auto mb-4" role="button">LOGOUT</a>
    </div>
    <div class="p-3"> 
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <ul class="navbar-nav flex-column">
                <?php
                    $destination = $_SESSION["role"] == "Student" ? "student/student_announcements.php" : "teacher/teacher_announcements.php";
                ?>
                <li class="nav-item"><a href="../<?php echo $destination ?>" class="nav-link active">Courses</a></li>
                <!-- <li class="nav-item"><a href="../../calendar.php" class="nav-link">Calendar</a></li> -->
                <li class="nav-item"><a href="../../settings.php" class="nav-link">Settings</a></li>
            </ul>
        </nav>
    </div>
</div>