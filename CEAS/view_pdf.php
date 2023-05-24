<?php
// Include the database connection file
include 'database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the project title from the URL parameter
    $title = $_GET["title"];

    // Prepare the SQL statement to retrieve the file details
    $query = "SELECT back, backname FROM ceas_projects WHERE title = ?";
    $statement = mysqli_prepare($connection, $query);

    if ($statement === false) {
        // Error in the SQL query
        die("Error: " . mysqli_error($connection));
    }

    // Bind the parameter to the statement
    mysqli_stmt_bind_param($statement, "s", $title);

    // Execute the statement
    if (mysqli_stmt_execute($statement)) {
        // Retrieve the result
        mysqli_stmt_bind_result($statement, $backURL, $backname);

        // Fetch the result
        if (mysqli_stmt_fetch($statement)) {
            // Set the appropriate content headers for PDF file
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=" . $backname);

            // Output the file content
            readfile($backURL);
        } else {
            // No matching project found
            echo "Project not found.";
        }
    } else {
        // Failed to execute the statement
        echo "Error: " . mysqli_error($connection);
    }

    // Close the statement
    mysqli_stmt_close($statement);
}

// Close the database connection
mysqli_close($connection);
?>
