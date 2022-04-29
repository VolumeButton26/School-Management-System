<!-- Announcements -->
<div id="announcements" class="container-fluid p-5">
    <h1 class="text-dark">Announcements</h1>
    <button type="" class="btn btn-dark">Add Announcement</button>
    
    <hr>
    <h5>Teacher Name <small>Date Time</small></h5>
    <p>We will not be meeting tomorrow yehey</p>

    <hr>
    <h5>Teacher Name <small>Date Time</small></h5>
    <p>We will be meeting tomorrow! yehey</p>
</div>

<!-- Modules -->
<div id="modules" class="container-fluid p-5">
    <h1 class="text-dark">Modules</h1>
    <div class="my-3">
        <button type="" class="btn btn-dark">Add Module</button>
        <button type="" class="btn btn-dark">Edit Module</button>
        <button type="" class="btn btn-danger">Delete Module</button>
        <!-- use modal for adding and editing -->
    </div>
    <div class="card">
        <div class="card-header bg-dark">
            <a class="card-link text-light collapse-link" data-toggle="collapse" href="#moduleOne">
            <img class="card-img-top collapse-icon" src="icons/collapse_button.png">
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

<!-- People -->
<!-- use same layout for student page -->
<div id="people" class="container-fluid p-5">
    <h1 class="text-dark">People</h1>
    <hr/>

    <div id="content">
        <!-- get content from database -->
        <a href="#student-list" class="btn btn-dark mx-auto mb-4" data-toggle="collapse" role="button"><h5 class="mb-1">Students</h5></a>
        <a href="#group-list" class="btn btn-dark mx-auto mb-4" data-toggle="collapse" role="button"><h5 class="mb-1">Group</h5></a>

        <div id="accordion">
            <div class="collapse show" id="student-list" data-parent="#accordion">
                <input type="text">
                <button type="" class="btn btn-dark">Add Student</button>
                <button type="" class="btn btn-danger">Delete Student</button>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Student One</li>
                    <li class="list-group-item">Student Two</li>
                    <li class="list-group-item">Student Three</li>
                    <li class="list-group-item">Student Four</li>
                </ul>
                <hr>
            </div>
            <div class="collapse" id="group-list" data-parent="#accordion">
                <button type="" class="btn btn-dark">Add Group</button>
                <button type="" class="btn btn-dark">Edit Group</button>
                <button type="" class="btn btn-danger">Delete Group</button>
                <hr>

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

                <hr>
            </div>
        </div>
    </div>
</div>

<!-- Grades -->
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