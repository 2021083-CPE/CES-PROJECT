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
                $_SESSION["loggedin"] = true;

                // Redirect the user to their respective department page
                switch ($department) {
                    case "admin":
                        header("Location: admin.html");
                        break;
                    case "CBAA":
                        header("Location: CBAA/login.html");
                        break;
                    case "CCJE":
                        header("Location: CCJE.html");
                        break;
                    case "CENAR":
                        header("Location: CENAR.html");
                        break;
                    case "CEAS":
                        header("Location: CEAS.html");
                        break;
                    case "CENTHRE":
                        header("Location: CENTHRE.html");
                        break;
                    case "CITEC":
                        header("Location: CITEC.html");
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

    header("location: login.html");
    exit;
}
?>
