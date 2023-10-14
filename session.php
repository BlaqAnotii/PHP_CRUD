<?php
session_start();
if (!empty($_SESSION['id']) && isset($_SESSION['id'])) {
    # code...
    $userid = $_SESSION['id'];
    $sqlsession = "SELECT * FROM `users` WHERE `id`='$userid'";
    $query = mysqli_query($conn, $sqlsession);
    if (mysqli_num_rows($query) > 0) {
        # code...
        $row = mysqli_fetch_assoc($query);
        $fname = $row["fname"];
        $lname = $row["lname"];
        

    } else {
        # code...
       echo "Not successful";
    }
}

?>