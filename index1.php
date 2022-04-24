<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/indexCss.css"/>

        <title>Portal</title>
    </head>
    
    <body>
        <div class="container">
            <div id="sidebar1" class="col-lg-4">
                <img src="images/avatarSample.png" alt="Avatar" class="avatar">
                <div class="text-center text-light my-3"><h2>NAME</h2></div>
                <div class="button-container-div">
                    <input type="submit" name="logout" value="Logout" class="form-submit-button form-submit-button:hover" >
                </div>
            </div>
        </div>
        <div class="container">
            <div class="sidebar2 col-lg-4">      
                <div class="button-container-div2">
                    <button class="unstyledButton unstyledButton:active"> Dashboard </button>
                </div>
                <div  class="button-container-div2">
                    <button class="unstyledButton button-selected:active"> Calendar </button>
                </div>
                <div  class="button-container-div2">
                    <button class="unstyledButton button-selected:active"> Grades </button>
                </div  class="button-container-div2">
                <div class="button-container-div2">
                    <button class="unstyledButton button-selected:active"> Settings </button>
                </div>
            </div>
        </div>

        <div id="courses" class="container" style="margin-top:4em">
            <h1 class="text-dark">Courses</h1>
            <br>
            <div class="card">
                <div class="card-header bg-dark">
                    <img class="card-img-top" src="icons/collapse_button.png" style="width:10px; height:13px;">
                    <a class="card-link text-light" data-toggle="collapse" href="#courseOne">
                    Course One
                    </a>
                </div>
                <div id="courseOne" class="collapse">
                    <div class="card-body bg-secondary">
                    <a class="card-link text-light" href="#">Announcements</a>
                    <hr/>
                    <a class="card-link text-light" href="#">Modules</a>
                    <hr/>
                    <a class="card-link text-light" href="#">People</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header bg-dark">
                    <img class="card-img-top" src="icons/collapse_button.png" style="width:10px; height:13px;">
                    <a class="card-link text-light" data-toggle="collapse" href="#courseTwo">
                    Course Two
                    </a>
                </div>
                <div id="courseTwo" class="collapse">
                    <div class="card-body bg-secondary">
                    <a class="card-link text-light" href="#">Announcements</a>
                    <hr/>
                    <a class="card-link text-light" href="#">Modules</a>
                    <hr/>
                    <a class="card-link text-light" href="#">People</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header bg-dark">
                    <img class="card-img-top" src="icons/collapse_button.png" style="width:10px; height:13px;">
                    <a class="card-link text-light" data-toggle="collapse" href="#courseThree">
                    Course Three
                    </a>
                </div>
                <div id="courseThree" class="collapse">
                    <div class="card-body bg-secondary">
                    <a class="card-link text-light" href="#">Announcements</a>
                    <hr/>
                    <a class="card-link text-light" href="#">Modules</a>
                    <hr/>
                    <a class="card-link text-light" href="#">People</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>