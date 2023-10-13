<?php
include "connect.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
$password = $_POST["password"];

//echo $email.$password;

$sql = "SELECT * FROM `users` WHERE `email`='$email' AND `pword`='$password '";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) ) {
    # code...
    $row = mysqli_fetch_assoc($query);
    $id = $row["id"];
    echo $id;
    $_SESSION['id'] = $id;
    header("location:profile.php");
    echo "logged in";
} else {
    # code
    echo "not logged in";
}

}



?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >

        <form>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"  name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
