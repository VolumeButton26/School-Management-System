<?php
    function displayAnnouncements() {
        echo "
        <div id=\"announcements\" class=\"container-fluid p-5\">
            <h1 class=\"text-dark\">Announcements</h1>
            
            <hr>
            <h5>Teacher Name <small>Date Time</small></h5>
            <p>We will not be meeting tomorrow yehey</p>

            <hr>
            <h5>Teacher Name <small>Date Time</small></h5>
            <p>We will be meeting tomorrow! yehey</p>
        </div>
        ";
    }

    function displayModules() {
        echo "
        <div id=\"modules\" class=\"container-fluid p-5\">
            <h1 class=\"text-dark\">Modules</h1>
            <div class=\"card\">
                <div class=\"card-header bg-dark\">
                    <a class=\"card-link text-light collapse-link\" data-toggle=\"collapse\" href=\"#moduleOne\">
                    <img class=\"card-img-top collapse-icon\" src=\"icons/collapse_button.png\">
                    Module 1: Basic Physics
                    </a>
                </div>
                <div id=\"moduleOne\" class=\"collapse\">
                    <div class=\"card-body bg-secondary\">
                    <a class=\"card-link text-light\" href=\"#\">1.1</a>
                    <hr/>
                    <a class=\"card-link text-light\" href=\"#\">1.2</a>
                    <hr/>
                    <a class=\"card-link text-light\" href=\"#\">1.3</a>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
    
    function displayPeople() {
        echo "
        <div id=\"people\" class=\"container-fluid p-5\">
            <h1 class=\"text-dark\">People</h1>
            <hr>

            <a href=\"#student-list\" class=\"btn btn-dark mx-auto mb-4\" data-toggle=\"collapse\" role=\"button\">Students</a>
            <a href=\"#group-list\" class=\"btn btn-dark mx-auto mb-4\" data-toggle=\"collapse\" role=\"button\">Groups</a>

            <div id=\"accordion\">
                <div class=\"collapse show\" id=\"student-list\" data-parent=\"#accordion\">
                    <ul class=\"list-group list-group-flush\">
                        <li class=\"list-group-item\">Student One</li>
                        <li class=\"list-group-item\">Student Two</li>
                        <li class=\"list-group-item\">Student Three</li>
                        <li class=\"list-group-item\">Student Four</li>
                    </ul>
                </div>
                <div class=\"collapse\" id=\"group-list\" data-parent=\"#accordion\">
                    <div class=\"card\">
                        <div class=\"card-header bg-secondary\">
                            <a href=\"#group-1\" class=\"card-link text-light\" data-toggle=\"collapse\">Group One</a>
                        </div>
                        <div class=\"card-body collapse\" id=\"group-1\">
                            <ul class=\"list-group list-group-flush\">
                                <li class=\"list-group-item\">Student One</li>
                                <li class=\"list-group-item\">Student Two</li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"card\">
                        <div class=\"card-header bg-secondary\">
                            <a href=\"#group-2\" class=\"card-link text-light\" data-toggle=\"collapse\">Group Two</a>
                        </div>
                        <div class=\"card-body collapse\" id=\"group-2\">
                            <ul class=\"list-group list-group-flush\">
                                <li class=\"list-group-item\">Student Three</li>
                                <li class=\"list-group-item\">Student Four</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
    }

    function displayGrades() {
        echo "
        <div id=\"grades\" class=\"container-fluid p-5\">
            <h1 class=\"text-dark\">Grades</h1>

            <hr>
            <h3>Assignments</h3>
            <table class=\"table table-sm\">
                <thead class=\"thead-dark\">
                    <tr>
                        <th style=\"width:40%\">Module</th>
                        <th style=\"width:20%\">Due</th>
                        <th style=\"width:20%\">Status</th>
                        <th style=\"width:10%\">Score</th>
                        <th style=\"width:10%\">Out Of</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.1</td>
                        <td>Apr 30, 2022 by 11:59 PM</td>
                        <td>Submitted</td>
                        <td>50</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>1.2</td>
                        <td>Apr 27, 2022 by 11:59 PM</td>
                        <td>Late</td>
                        <td>40</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>1.3</td>
                        <td>Apr 27, 2022 by 11:59 PM</td>
                        <td>Not Submitted</td>
                        <td>0</td>
                        <td>50</td>
                    </tr>

                    <tr>
                        <th colspan=\"3\">Total</th>
                        <td>90</td>
                        <td>150</td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <h3>Quizzes</h3>
            <table class=\"table table-sm\">
                <thead class=\"thead-dark\">
                    <tr>
                        <th style=\"width:40%\">Module</th>
                        <th style=\"width:20%\">Due</th>
                        <th style=\"width:20%\">Status</th>
                        <th style=\"width:10%\">Score</th>
                        <th style=\"width:10%\">Out Of</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.4</td>
                        <td>May 2, 2022 by 11:59 PM</td>
                        <td>Submitted</td>
                        <td>50</td>
                        <td>50</td>
                    </tr>

                    <tr>
                        <th colspan=\"3\">Total</th>
                        <td>50</td>
                        <td>50</td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <h3>Additional</h3>
            <table class=\"table table-sm\">
                <thead class=\"thead-dark\">
                    <tr>
                        <th style=\"width:80%\">Name</th>
                        <th style=\"width:10%\">Score</th>
                        <th style=\"width:10%\">Out Of</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>50</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>50</td>
                        <td>50</td>
                    </tr>
                </tbody>
            </table>
        </div>
        ";
    }
?>