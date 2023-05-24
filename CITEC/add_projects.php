<?php
// Include the database connection file
include 'database_connection.php';

// Check if the user is logged in and belongs to the CBAA department
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["department"] !== "CITEC") {
    header("Location: ../login.html"); // Redirect to the login page if not logged in or not from the CBAA department
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    // Perform necessary validation and sanitization of the inputs
    // Example validation: Check if required fields are not empty
    if (empty($title) || empty($description) || empty($status)) {
        echo "Please fill in all the required fields.";
        exit;
    }

    // Get the uploaded file data
    $backURL = 'uploads/' . $_FILES['back']['name'];
    move_uploaded_file($_FILES['back']['tmp_name'], $backURL);

    $backname = $_FILES['back']['name'];
    $picture = file_get_contents($_FILES['picture']['tmp_name']);
    $picturename = $_FILES['picture']['name'];

    // File type validation (allow PDF, DOC, and TXT files for 'back' file)
    $allowedBackExtensions = ['pdf', 'doc', 'txt'];
    $backFileExtension = pathinfo($backname, PATHINFO_EXTENSION);
    if (!in_array($backFileExtension, $allowedBackExtensions)) {
        echo "Invalid file type for 'back' file. Only PDF, DOC, and TXT files are allowed.";
        exit;
    }

    // Prepare the SQL statement
    $query = "INSERT INTO citec_projects (title, description, status, back, backname, picture, picturename) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $statement = mysqli_prepare($connection, $query);

    if ($statement === false) {
        // Error in the SQL query
        die("Error: " . mysqli_error($connection));
    }

    // Bind the parameters to the statement
    mysqli_stmt_bind_param($statement, "sssssss", $title, $description, $status, $backURL, $backname, $picture, $picturename);

    // Execute the statement
    if (mysqli_stmt_execute($statement)) {
        // Project added successfully
        header("Location: citecmodify.php"); // Redirect to the CBAA page or any other desired page
        exit;
    } else {
        // Failed to add the project
        echo "Error: " . mysqli_error($connection);
    }

    // Close the statement
    mysqli_stmt_close($statement);
}

// Close the database connection
mysqli_close($connection);
?>
