<?php
// Assuming you have already established a database connection

session_start();

// Check if the user is logged in and belongs to the CBAA department
if (!isset($_SESSION["loggedin"]) || $_SESSION["department"] !== "CBAA") {
    header("Location: ../login.html"); // Redirect to login page if not logged in or not from CBAA department
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    // Perform necessary validation and sanitization of the inputs

    // Prepare the SQL statement
    $query = "INSERT INTO Cbaa_projects (title, description, status) VALUES (?, ?, ?)";
    $statement = mysqli_prepare($connection, $query);
    
    // Bind the parameters to the statement
    mysqli_stmt_bind_param($statement, "sss", $title, $description, $status);
    
    // Execute the statement
    if (mysqli_stmt_execute($statement)) {
        // Project added successfully
        header("Location: view_CBAA.html"); // Redirect to CBAA page or any other desired page
        exit;
    } else {
        // Failed to add the project
        echo "Error: " . mysqli_error($connection);
    }

    // Close the statement
    mysqli_stmt_close($statement);

    // Close the database connection
    mysqli_close($connection);
}
?>
