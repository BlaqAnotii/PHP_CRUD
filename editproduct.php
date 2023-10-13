<?php

include "connect.php";
$productid = $_GET["id"];

$sql = "SELECT * FROM `product` WHERE `id`= $productid";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query)>0) {
    # code...
    $row = mysqli_fetch_assoc($query);
   $inputpname = $row["pname"];
   $inputcost = $row["cost"];
   $inputstock = $row["stock"];
} else {
    # code...
    echo "Invalid";
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
<h2>EDIT PROFILE</h2>
<form action="<?php echo htmlspecialchars('update.php');?>" method="POST">
<label for="pname">Product Name:</label>
  <input type="text" name="pname"  value="<?= $inputpname; ?>"  required><br><br>
  
  <label for="cost">Cost:</label>
  <input type="text" name="cost"  value="<?= $inputcost; ?>"  required><br><br>
  
  <label for="stock">Stock:</label>
  <input type="text" name="stock"  value="<?= $inputstock; ?>"  required><br><br>
  <input type="hidden" name="productid" value="<?= $productid; ?>">
  
  <input type="submit" value="Update">
</form>

</body>
</html>