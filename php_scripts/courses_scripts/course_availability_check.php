<!DOCTYPE html>
    <body>
        <?php
            include('connect.php');
            $name = $_GET["name"];

            mysqli_select_db($conn, $db);
            $sql = "SELECT Course_name FROM courses WHERE Course_name = '$name'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                echo "This course name is already taken.";
            }
            echo "";
            mysqli_close($conn);
        ?>
    </body>
</html>