<?php
@include'config.php';



// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store the submitted email
$email = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the submitted email
    $email = htmlspecialchars($_POST["email"]);

    // Validate the email address (you can add more robust validation)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert the email into the database
        $sql = "INSERT INTO sub_form(email) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo "<p>Thank you for subscribing with email: $email</p>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "<p>Invalid email address. Please enter a valid email address.</p>";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Subscription Form</title>
    <link rel="stylesheet" href="sub.css">
</head>
<body>
<div class="newsletter">
<h2>Email Subscription Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="box">
    <label for="email"></label>
    <input type="email" name="email" placeholder="enter your email...." id="email" value="<?php echo $email; ?>" required><br><br>
    <input type="submit" name="subscribe" value="Subscribe" class="btn">
</div>
    
</form>
</div>
</body>
</html>
