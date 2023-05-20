<?php
// Include the database connection file
include 'database_connection.php';

// Check if the project title is provided in the URL
if (isset($_GET['title']) && !empty($_GET['title'])) {
    $title = $_GET['title'];

    // Perform the delete operation
    $query = "DELETE FROM ceas_projects WHERE title = '$title'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Delete operation successful
        echo "Project deleted successfully.";
        
        // Redirect back to cbaamodify.php
        header("Location: ceasmodify.php");
        exit();
    } else {
        // Delete operation failed
        echo "Error deleting project: " . mysqli_error($connection);
    }
} else {
    // Project title not provided or empty
    echo "Invalid project title.";
}

// Close the database connection
mysqli_close($connection);
?>
