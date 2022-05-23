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
                            while ($row = $assigned_courses->fetch_assoc()) {
                                if ($row["Course_number"] == $courses_sb_selected_number) {
                                    continue;
                                }
                                $course_number = $row["Course_number"];
                                $course = sql("SELECT Course_name FROM courses WHERE Course_number = $course_number");
                                if ($course->num_rows == 1) {
                                    $course_row = $course->fetch_assoc();
                                    echo "<a href=\"teacher_announcements.php?course=" . $course_number . "\" class=\"card-link text-light\">" . $course_row["Course_name"] . "</a>";
                                    echo "<hr>";
                                }
                            }
                        }
                    ?>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add-course-modal">Add</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-course-modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="px-1 pb-1"> 
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav flex-column">
                <li class="nav-item"><a href="teacher_announcements.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">Announcements</a></li>
                <li class="nav-item"><a href="teacher_modules.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">Modules</a></li>
                <li class="nav-item"><a href="teacher_people.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">People</a></li>
                <li class="nav-item"><a href="teacher_grading_system.php?course=<?php echo $courses_sb_selected_number?>" class="nav-link<?php if ($courses_sb_selected_number == null) { echo " disabled"; }?>">Grading System</a></li>
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
                        <p id="course-availability-message" class="text-danger"></p>
                    </div>
                    <h6 id="test">Grading System</h6>
                    <div class="form-group">
                        <label for="assignments-distribution">Assignments</label>
                        <input type="number" name="assignments-distribution" class="form-control mb-2 gs-distrib" min="0" max="100" value="0" required>
                    </div>
                    <div class="form-group">
                        <label for="quizzes-distribution" id="quiz-label">Quizzes</label>
                        <input type="number" name="quizzes-distribution" class="form-control mb-2 gs-distrib" min="0" max="100" value="0" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="add-course" value="add-course" class="btn btn-dark" id="add-course">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delete-course-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Course</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="../../php_scripts/courses_scripts/delete_course.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="course-name">Course Name</label>
                        <input type="text" name="course-name" class="form-control mb-2" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="delete-course" value="delete-course" class="btn btn-danger" id="delete-course">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var total = 100;
    var inputs = document.getElementsByClassName("gs-distrib");

    for (let input of inputs) {
        input.onchange = verifyTotal;
    }
    
    function verifyTotal() {
        if (this.value > parseInt(this.max)) {
            this.value = parseInt(this.max);
        } 
        else if (this.val < parseInt(this.min)) {
            this.value = parseInt(this.min);
        }

        var current = available();
        for (let input of inputs) {
            input.max = parseInt(input.value) + total - current;
        }
    }

    function available() {
        var sum = 0;
        for (let input of inputs) {
            sum += parseInt(input.value);
        }
        return sum;
    }
</script>