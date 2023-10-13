<?php
include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $inputpname = $_POST["pname"];
    $inputcost = $_POST["cost"];
    $inputstock = $_POST["stock"];
    $productid = $_POST["productid"];

    $sql = "UPDATE `product` SET `pname` = '$inputpname', `cost` = '$inputcost', `stock` = '$inputstock' WHERE `id` = $productid";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        # code...
        echo "updated successfully!";


    } else {
        # code...
        echo "not updated!";

    }
    


}else{

echo "Not Valid";
}


?>