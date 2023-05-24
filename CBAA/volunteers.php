<?php
// Include the database connection file
include '../CBAA/database_connection.php';

// Retrieve the form data
$projectTitle = $_POST['project-title'];
$department = $_POST['department'];
$fullName = $_POST['full-name'];
$email = $_POST['email'];
$department = $_POST['department'];

// Insert the user information into the department's table
$query = "INSERT INTO cbaa_volunteers (project_title, name, email, department) VALUES ('$projectTitle', '$fullName', '$email', '$department')";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    echo "<p>Successfully joined the project.</p>";
    header("Location: ../display/view_CBAA.php?success=1");
    exit();
  } else {
    echo "<p>Error: " . mysqli_error($connection) . "</p>";
    header("Location: ../display/view_CBAA.php?error=1");
    exit();
  }
  

// Close the database connection
mysqli_close($connection);
?>
