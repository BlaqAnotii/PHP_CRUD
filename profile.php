<?php
include "connect.php";
session_start();
if (isset($_SESSION['id'])) {
    # code...
    $userid = $_SESSION['id'];
    $sql = "SELECT * FROM `users` WHERE `id`='$userid'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        # code...
        $row = mysqli_fetch_assoc($query);
        $firstname = $row["fname"];
        $lastname = $row["lname"];
        $email = $row["email"];


    } else {
        # code...
        header("location:logout.php");
    }
}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Profile Details</h2>
        <dl class="row">
            <dt class="col-sm-3">First Name</dt>
            <dd class="col-sm-9"><?= $firstname;?></dd>

            <dt class="col-sm-3">Last Name</dt>
            <dd class="col-sm-9"><?= $lastname;?></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><?= $email;?></dd>
        </dl>

        <h2>Product Table</h2>
        <!-- Add your product table here -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Cost</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Add rows for each product -->
        <?php
$sqlproduct = "SELECT * FROM `product`";
$query = mysqli_query($conn, $sqlproduct);
if (mysqli_num_rows($query) > 0) {
    # code...
    while ($row = mysqli_fetch_assoc($query)) {
        # code...
    $pname = $row["pname"];
    $cost = $row["cost"];
    $stock = $row["stock"];
    echo '
    <tr>
            <td>'.$pname.'</td>
            <td>'.$cost.'</td>
            <td>'.$stock.'</td>
            <td><a href="editproduct.php?id=' . $row['id'] . '">Edit</a></td>
        </tr>
    ';
    }
    

} else {
    # code...
    echo "Not Successful";
}


?>
        
       
        <!-- Add more rows as needed -->
    </tbody>
</table>


        <h2>Store Table</h2>
        <!-- Add your store table here -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Cost</th>
            <th>Stock</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Add rows for each product in the store -->
        <tr>
            <td>Product A</td>
            <td>$20.00</td>
            <td>75</td>
            <td>2023-10-12</td>
            <td><button class="btn btn-primary">Edit</button></td>
        </tr>
        <tr>
            <td>Product B</td>
            <td>$25.00</td>
            <td>40</td>
            <td>2023-10-11</td>
            <td><button class="btn btn-primary">Edit</button></td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

    </div>
</body>
</html>
