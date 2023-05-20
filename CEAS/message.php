<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ces";

// Create a new MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $message = $_POST['message'];

    // Prepare the SQL statement
    $sql = "INSERT INTO messages (name, email, department, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $department, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Message stored in the database successfully

        // Redirect back to the index.html page or any other appropriate page
        header('Location: index.html');
        exit;
    } else {
        // Error occurred while storing the message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
