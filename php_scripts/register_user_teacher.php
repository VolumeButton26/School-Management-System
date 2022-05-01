<?php
    include('connect.php');

    $id = $_POST['id'];
    $password = $_POST['password'];
    $role = "Teacher";
    $family_name = $_POST['family-name'];
    $first_name = $_POST['first-name'];
    $middle_name = $_POST['middle-name'];

    if (isset($_POST['register'])) {
        sql("INSERT INTO login_information VALUES ('$id', '$password', '$role')");
        sql("INSERT INTO teacher_information VALUES('$id', '$family_name', '$first_name', '$middle_name')");
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['role'] = "Teacher";
        $_SESSION['family_name'] = $family_name;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['middle_name'] = $middle_name;
        header("Location: ../courses/teacher/teacher_announcements.php");
    }
?>