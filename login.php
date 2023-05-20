<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $department = $_POST["department"];
    
    // Database configuration
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "users";

    // Create a new MySQLi object
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists in the database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedUsername = $row["username"];
        $storedPassword = $row["password"];
        $storedDepartment = $row["department"];
        
        // Check if the username and password match
        if ($username === $storedUsername && $password === $storedPassword) {
            // Check if the user is in the correct department
            if ($department === $storedDepartment) {
                // Set the session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["department"] = $department;

                // Redirect the user to their respective department page
                switch ($department) {
                    case "admin":
                        header("Location: admin/admin.html");
                        break;
                    case "CBAA":
                        header("Location: CBAA/cbaamodify.php");
                        break;
                    case "CCJE":
                        header("Location: CCJE/ccjemodify.php");
                        break;
                    case "CENAR":
                        header("Location: CENAR/cenarmodify.php");
                        break;
                    case "CEAS":
                        header("Location: CEAS/ceasmodify.php");
                        break;
                    case "CENTHRE":
                        header("Location: CENTHRE/centhremodify.php");
                        break;
                    case "CITEC":
                        header("Location: CITEC/citecmodify.php");
                        break;
                    // Add more cases for other departments

                    default:
                        header("Location: login.html");
                        break;
                }
                exit;
            } else {
                $error = "Invalid department for the user";
            }
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "User not found";
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();

    header("Location: login.html");
    exit;
}
?>
