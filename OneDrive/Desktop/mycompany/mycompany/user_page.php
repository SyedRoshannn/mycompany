<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
  header('location:signin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
<div class="container">

<div class="content">
<h3>hi, <span>User</span></h3>
 <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
  <p>this is an User Page</p>
<a href="signin.php" class="btn">Sign In</a> 
<a href="signup.php" class="btn">Sign Up</a>
<a href="logout.php" class="btn">logout</a>
</div>
    
</body>
</html>