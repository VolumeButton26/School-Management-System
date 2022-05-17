<?php
    include('../../php_scripts/connect.php');
    session_start();

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    }
    else {
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Port</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    
        <link rel="stylesheet" href="../../css/styles.css">
    </head>
    
    <body>
        <!-- Main Sidebar -->
        <?php include('../courses_main_sidebar.php'); ?>

        <!-- Courses Sub Sidebar -->
        <?php include('../courses_sub_sidebar_student.php'); ?>

        <!-- Content -->
        <main>
            <div id="announcements" class="container-fluid p-5">
                <h1 class="text-dark">Announcements</h1>
                <hr/>

                <div id="content">
                    <!-- get content from database -->
                    <h3>Assignments</h3>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:40%">Module</th>
                                <th style="width:20%">Due</th>
                                <th style="width:20%">Status</th>
                                <th style="width:10%">Score</th>
                                <th style="width:10%">Out Of</th>
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
                                <th colspan="3">Total</th>
                                <td>90</td>
                                <td>150</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>
                    <h3>Quizzes</h3>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:40%">Module</th>
                                <th style="width:20%">Due</th>
                                <th style="width:20%">Status</th>
                                <th style="width:10%">Score</th>
                                <th style="width:10%">Out Of</th>
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
                                <th colspan="3">Total</th>
                                <td>50</td>
                                <td>50</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>
                    <h3>Additional</h3>
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:80%">Name</th>
                                <th style="width:10%">Score</th>
                                <th style="width:10%">Out Of</th>
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
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>