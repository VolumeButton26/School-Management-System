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
<div class="accordion" id="accordionExample">
    <div id="people" class="container-fluid p-5">
        <h1 class="text-dark">People</h1>
        <!--buttons-->
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        
        <h3>Students</button>
        </button>
    
    
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <h3>Groups</button>
        </button>
        <div class="card">
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <input type="text">
                <button type="" class="btn btn-dark">Add Student</button>
                <button type="" class="btn btn-danger">Delete Student</button>
                <h6>Student Name</h6>
            </div>
        </div>
        <div class="card">
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <button type="" class="btn btn-dark">Add Group</button>
                    <button type="" class="btn btn-dark">Edit Group</button>
                    <button type="" class="btn btn-danger">Delete Group</button>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h7>Group1</h7>
                                </button>
                            </h2>
                        </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#collapseTwo">
                            <div class="card-body">
                                <p>Student1</p>
                                <p>Student2</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
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