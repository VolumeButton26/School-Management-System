<?php
    $courses_sb_selected_number;
    $courses_sb_selected_name;

    if (!isset($_GET['course'])) {
        $courses_sb_selected_number = null;
        $courses_sb_selected_name = "No Course Selected";
    }
    else {
        $courses_sb_selected_number = $_GET['course'];
        $result = sql("SELECT Course_name FROM courses WHERE Course_number = $courses_sb_selected_number");
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $courses_sb_selected_name = $row["Course_name"];
        }
    }
?>
<div class="bg-white border-right sub-sidebar">
    <div class="container pt-3 px-4">
        <h3 class="text-dark">Courses</h3>
        <div class="card">
            <div class="card-header bg-dark">
                <a class="card-link text-light" data-toggle="collapse" href="#courseDropdownMenu"><?php echo $courses_sb_selected_name?></a>
            </div>
            <div id="courseDropdownMenu" class="collapse">
                <div class="card-body bg-secondary">
                    <?php
                        $assigned_courses = sql("SELECT Course_number FROM assigned_courses WHERE ID_number = '$id' ORDER BY Course_number");
                        if ($assigned_courses->num_rows > 0) {
                            $first = true;
                            while ($row = $assigned_courses->fetch_assoc()) {
                                if ($row["Course_number"] == $courses_sb_selected_number) {
                                    continue;
                                }
                                $course_number = $row["Course_number"];
                                $course = sql("SELECT Course_name FROM courses WHERE Course_number = $course_number");
                                if ($course->num_rows == 1) {
                                    $course_row = $course->fetch_assoc();
                                    if (!$first) {
                                        echo "<hr>";
                                    }
                                    echo "<a href=\"student_announcements.php?course=" . $course_number . "\" class=\"card-link text-light\">" . $course_row["Course_name"] . "</a>";
                                    $first = false;
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="px-1 pb-1"> 
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a href="student_announcements.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">Announcements</a></li>
                <li class="nav-item"><a href="student_modules.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">Modules</a></li>
                <li class="nav-item"><a href="student_people.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">People</a></li>
                <li class="nav-item"><a href="student_grades.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">Grading System</a></li>
            </ul>
        </nav>
    </div>
</div>