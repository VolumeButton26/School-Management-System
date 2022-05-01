<?php
    include('connect.php');

    $id = $_POST['id'];
    $password = $_POST['password'];
    $role = "Student";
    $family_name = $_POST['family-name'];
    $first_name = $_POST['first-name'];
    $middle_name = $_POST['middle-name'];
    $sex = $_POST['sex'];
    $year = $_POST['year'];
    $program = $_POST['program'];
    $section = $_POST['section'];

    if (isset($_POST['register'])) {
        sql("INSERT INTO login_information VALUES ('$id', '$password', '$role')");
        sql("INSERT INTO student_information VALUES('$id', '$family_name', '$first_name', '$middle_name', '$sex', '$year', '$program', '$section')");
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['role'] = "Student";
        $_SESSION['family_name'] = $family_name;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['middle_name'] = $middle_name;
        $_SESSION['sex'] = $sex;
        $_SESSION['year'] = $year;
        $_SESSION['program'] = $program;
        $_SESSION['section'] = $section;
        header("Location: ../courses/student/student_announcements.php");
    }
?>