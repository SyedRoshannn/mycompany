<?php
// Database configuration (modify with your own database credentials)
@include'config.php';

// Create a database connection


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables to store form data
$location = "";
$pickupDate = "";
$returnDate = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $location = htmlspecialchars($_POST["location"]);
    $pickupDate = htmlspecialchars($_POST["pickup_date"]);
    $returnDate = htmlspecialchars($_POST["return_date"]);

    // Insert data into the database
    $sql = "INSERT INTO search_form (location, pickup_date, return_date) VALUES ( ?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $location, $pickupDate, $returnDate);

    if ($stmt->execute()) {
        echo "<h2>Submitted Information:</h2>";
        echo "<p><strong>Location:</strong> $location</p>";
        echo "<p><strong>Pickup Date:</strong> $pickupDate</p>";
        echo "<p><strong>Return Date:</strong> $returnDate</p>";
        echo "<p>Data has been successfully submitted to the database.</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Form</title>
    <link rel="stylesheet" href="stylessa.css">
</head>
<body>

<h1>Car Rental Form</h1>
<div class="form-container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="input-box">
    <label for="location">Location:</label>
    <input type="text" name="location" id="location" value="<?php echo $location; ?>" required><br><br>
</div>
<div class="input-box">
    <label for="pickup_date">Pickup Date:</label>
    <input type="date" name="pickup_date" id="pickup_date" value="<?php echo $pickupDate; ?>" required><br><br>
</div>
    <div class="input-box">
    <label for="return_date">Return Date:</label>
    <input type="date" name="return_date" id="return_date" value="<?php echo $returnDate; ?>" required><br><br>
</div>
    <input type="submit" value="Submit" class="btn">
</form>
</div>

</body>
</html>
