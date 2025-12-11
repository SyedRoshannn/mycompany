<?php
include 'config.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests= $_POST['guests'];
    $leaving = $_POST['arrivals']; 
    $arrivals = $_POST['leaving']; 

    $insert = " INSERT INTO book_form(name, email, phone, address, location, guests, leaving, arrivals) VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$leaving', '$arrivals')";

    $request = mysqli_query($conn, $insert);

    header('location:rent.php');
}
else
{
    echo'something went wrong try again';
}
?>
