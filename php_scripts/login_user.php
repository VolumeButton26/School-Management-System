<?php
    include('connect.php');

    $id = $_POST['id'];
    $password = $_POST['password'];

    if (isset($_POST['login'])) {
        $login = "SELECT ID_number, Password, Role
                  FROM login_information
                  WHERE ID_number='$id' AND Password='$password'";
        $result = sql($login);

        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $row["Role"];
                

                if ($row["Role"] == "Student") {
                    $info = "SELECT *
                             FROM student_information
                             WHERE ID_number='$id'";
                    $info_result = sql($info);

                    if ($info_result->num_rows == 1) {
                        while ($info_row = $info_result->fetch_assoc()) {
                            $_SESSION['family_name'] = $info_row["Family_name"];
                            $_SESSION['first_name'] = $info_row["First_name"];
                            $_SESSION['middle_name'] = $info_row["Middle_name"];
                            $_SESSION['sex'] = $info_row["Sex"];
                            $_SESSION['year'] = $info_row["Year"];
                            $_SESSION['program'] = $info_row["Program"];
                            $_SESSION['section'] = $info_row["Section"];
                        }
                    }
                }
                else {
                    $info = "SELECT *
                             FROM teacher_information
                             WHERE ID_number='$id'";
                    $info_result = sql($info);

                    if ($info_result->num_rows == 1) {
                        while ($info_row = $info_result->fetch_assoc()) {
                            $_SESSION['family_name'] = $info_row["Family_name"];
                            $_SESSION['first_name'] = $info_row["First_name"];
                            $_SESSION['middle_name'] = $info_row["Middle_name"];
                        }
                    }
                }
                
                $destination = $row["Role"] == "Student" ? "../courses/student/student_announcements.php" : "../courses/teacher/teacher_announcements.php";
                header("Location: $destination");
            }
        }
        else {
            header("Location: ../index_mismatch.php");
        }
    }
?>