<?php
    include('connect.php');
    session_start();

    $id = $_SESSION['id'];
    $old_password = $_POST['old-password'];
    $password = $_POST['password'];

    if (isset($_POST['update'])) {
        $search = "SELECT Password
                   FROM login_information
                   WHERE ID_number = '$id'";
        $result = sql($search);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($old_password == $row["Password"]) {
                $update = "UPDATE login_information
                           SET Password = '$password'
                           WHERE ID_number = '$id'";
                sql($update);
            }
        }
    }

    if(isset($_REQUEST["destination"])){
        header("Location: {$_REQUEST["destination"]}");
    }else if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }else{
        header("Location: settings.php");
    }
?>