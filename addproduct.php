<?php
include "connect.php";
include "session.php";

$productid= $_GET["id"];

// fetch product details
$productsql = "SELECT * FROM `product` WHERE `id`=$productid";
$productquery = mysqli_query($conn, $productsql);
if(mysqli_num_rows($productquery) > 0){
    $productrow = mysqli_fetch_assoc($productquery);
    $productname = $productrow["pname"];
    $companystock = $productrow["stock"];
}else{
    header("location:profile.php");
}

// fetch user store details
$storesql = "SELECT * FROM `store` WHERE `userid`=$userid AND `productid` = $productid";
$storequery = mysqli_query($conn, $storesql);
if(mysqli_num_rows($storequery) > 0){
    $storerow = mysqli_fetch_assoc($storequery);
    $storeid = $storerow["id"];
    $customerstock = $storerow["stock"];
}else{
    header("location:profile.php");
}



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $newstockinput = $_POST["newstock"];
    if(($newstockinput > 0) && ($companystock >= $newstockinput)){
        $newcompanystock = $companystock - $newstockinput;
        $sqlcompanyupdate = "UPDATE `product` SET `stock` = $newcompanystock WHERE `id`=$productid";
        $updatecompanyquery = mysqli_query($conn, $sqlcompanyupdate);
        if($updatecompanyquery){
            $newcustomerstock = $customerstock + $newstockinput;
            $sqlcustomerupdate = "UPDATE `store` SET `stock` = $newcustomerstock WHERE `id`=$storeid";
            $updatecustomerquery = mysqli_query($conn, $sqlcustomerupdate);
            if($updatecustomerquery){
                echo "Customer store updated";
                header("location:addproduct.php?id=$productid");
            }else{
                echo "Could not update customer product stock";
            }
        }else{
            echo "Could not update company product stock";
        }

    }else{
        echo "Order is invalid or greater than company stock";
    }
}


?>



<!DOCTYPE html>
<html>
<head>
    <title>Add product</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Add Product</h2>
        <dl class="row">
            <dt class="col-sm-3">Customer: </dt>
            <dd class="col-sm-9"><?= $fname." ".$lname?></dd>

            <dt class="col-sm-3">Product Name:</dt>
            <dd class="col-sm-9"><?= $productname?></dd>

            <dt class="col-sm-3">Customer stock:</dt>
            <dd class="col-sm-9"><?= $customerstock?></dd>

            <dt class="col-sm-3">Company stock:</dt>
            <dd class="col-sm-9"><?= $companystock?></dd><br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?id=$productid")?>" method="post">
            <label for="stock">Add product:</label>
  <input type="number" name="newstock"  value="<?= $companystock?>" max="<?= $companystock?>" required><br>
  
  <input type="submit" value="Add">
</form>
        </dl>
        </body>
</html>