<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Canvas Ripoff</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
        <link rel="stylesheet" href="css/styles.css">

        
    </head>
    
    <body class="bg-secondary">
        <div class="card text-white bg-dark shadow index-card mx-auto my-5">
            <div class="card-body px-5 pb-4">
                <h1 class="text-center display-4"><strong>TEACHER</strong></h1>
                
                <form action="php_scripts/register_user_teacher.php" method="post">
                    <div class="form-group">
                        <label for="ID">Teacher ID</label>
                        <input type="text" name="id" class="form-control mb-2" onkeyup="showAvailability(this.value)" required>
                        <p id="id-availability-message" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <label for="ID">Password</label>
                        <input type="password" name="password" id="password" class="form-control mb-2" onkeyup="validatePasswordMatch()" required>
                    </div>
                    <div class="form-group">
                        <label for="ID">Confirm Password</label>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control mb-2" onkeyup="validatePasswordMatch()" required>
                    </div>
                    <p id="password-validation-message"></p>

                    <div class="mt-4">
                        <h5>Personal Information:</h5>
                    </div>
                    <div class="form-group">
                        <label for="family-name">Family Name</label>
                        <input type="text" name="family-name" class="form-control mb-2" required>
                    </div>
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first-name" class="form-control mb-2" required>
                    </div>
                    <div class="form-group">
                        <label for="middle-name">Middle Name</label>
                        <input type="text" name="middle-name" class="form-control mb-2">
                    </div>

                    <div class="form-group">
                        <a href="index.php" class="btn btn-outline-light text-white float-left">Cancel</a>
                        <button type="submit" name="register" value="Register" class="btn btn-outline-light float-right" id="submit" disabled>Confirm</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
        <script src="js_scripts/register_checks.js"></script>
    </body>
</html>