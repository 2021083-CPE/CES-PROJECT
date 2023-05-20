<?php
// Include the database connection file
include 'database_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    // ... get other form fields as needed

    // Update the project details in the database
    $query = "UPDATE ceas_projects SET description = '$description', status = '$status' WHERE title = '$title'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Update successful
        echo "Project updated successfully.";
        header("Location: ceasmodify.php");
    } else {
        // Update failed
        echo "Error updating project: " . mysqli_error($connection);
    }
} else {
    // Form not submitted
    echo "Form not submitted.";
}

// Close the database connection
mysqli_close($connection);
?>
