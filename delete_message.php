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
    $messageId = $_POST['message_id'];

    // Prepare the SQL statement
    $sql = "DELETE FROM messages WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $messageId);

    // Execute the statement
    if ($stmt->execute()) {
        // Message deleted from the database successfully
        echo "Message deleted successfully";
        exit;
    } else {
        // Error occurred while deleting the message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}


// Close the database connection
$conn->close();
?>
