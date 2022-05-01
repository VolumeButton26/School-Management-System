<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "school_management_db";

    //create connection
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }

    function sql($comm) {
        global $conn;
        $result = $conn->query($comm);
        if ($result === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return;
        }
        return $result;
    }
?>