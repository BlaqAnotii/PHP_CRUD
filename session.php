<?php
session_start();
if (!empty($_SESSION['id']) && isset($_SESSION['id'])) {
    # code...
    $productid = $_SESSION['id'];
    $sqlproduct = "SELECT * FROM `product` WHERE `id`='$productid'";
    $query = mysqli_query($conn, $sqlproduct);
    if (mysqli_num_rows($query) > 0) {
        # code...
        $row = mysqli_fetch_assoc($query);
        $inputpname = $row["pname"];
        $inputcost = $row["cost"];
        $inputstock = $row["stock"];
        

    } else {
        # code...
       echo "Not successful";
    }
}

?>