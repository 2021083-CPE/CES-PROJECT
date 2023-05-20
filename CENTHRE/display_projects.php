<?php
// Include the database connection file
include 'database_connection.php';

// Fetch the projects from the database
$query = "SELECT * FROM centhre_projects";
$result = mysqli_query($connection, $query);

if ($result) {
    // Check if there are any projects in the database
    if (mysqli_num_rows($result) > 0) {
        // Loop through the projects and display them
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row["title"];
            $description = $row["description"];
            $status = $row["status"];
            $backData = $row["back"];
            $pictureData = $row["picture"];

            // Display the project information
            echo "<div class='project'>";
            echo "<h3>$title</h3>";
            echo "<p>$description</p>";
            echo "<p>Status: $status</p>";
            echo "<div class='pdf-container'>";
            echo "<a href='view_pdf.php?file=" . urlencode($backData) . "' target='_blank'>View PDF</a>";

            echo "</div>";
            echo "<div class='project-image'><img src='data:image/jpeg;base64," . base64_encode($pictureData) . "' alt='Project Picture'></div>";
            echo "</div>";
        }
    } else {
        echo "<p>No projects found.</p>";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    echo "<p>Error: " . mysqli_error($connection) . "</p>";
}

// Close the database connection
mysqli_close($connection);
?>
