<!DOCTYPE html>
    <body>
        <?php
            include('connect.php');
            $id = $_GET["id"];

            mysqli_select_db($conn, $db);
            $sql = "SELECT ID_number FROM login_information WHERE ID_number = '$id'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                echo "This ID is already taken.";
            }
            echo "";
            mysqli_close($conn);
        ?>
    </body>
</html>