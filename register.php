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
        <div class="card text-white bg-dark shadow index-card mx-auto mt-5">
            <div class="card-body px-5 pb-4">
                <h1 class="text-center display-4"><strong>REGISTER</strong></h1>
                
                <label for="ID">Student/Faculty ID</label>
                <input type="text" name="ID" class="form-control mb-2">
                <label for="ID">Password</label>
                <input type="password" name="Password" class="form-control mb-2">
                <label for="ID">Confirm Password</label>
                <input type="password" name="Confirm-Password" class="form-control mb-4">           
                
                <div class="dropdown mb-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        Choose your Role
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Student</a>
                        <a class="dropdown-item" href="#">Teacher</a>
                    </div>
                </div>        

                <a href="index.php" class="btn btn-outline-light text-white float-left">Cancel</a>
                <a href="index.php" class="btn btn-outline-light text-white float-right">Confirm</a>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>