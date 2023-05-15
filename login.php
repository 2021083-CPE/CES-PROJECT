<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $department = $_POST["department"];
    
    // Check if user is admin
    if ($username == "admin" && $password == "password" && $department == "admin") {
        $_SESSION["loggedin"] = true;
        header("Location: admin.html");
        exit;
    } 
    
    // Check if user is from department CBAA
    else if ($username == "CBAA-coordinator" && $password == "CBAAPASS" && $department == "CBAA") {
        $_SESSION["loggedin"] = true;
        header("Location: CBAA.html");
        exit;

    } 
    
    // Check if user is from department CCJE
    else if ($username == "CCJE-coordinator" && $password == "CCJEPASS" && $department == "CCJE") {
        $_SESSION["loggedin"] = true;
        header("Location: CCJE.html");
        exit;
    } 
    // Check if user is from department CENAR
    else if ($username == "CENAR-coordinator" && $password == "CENARPASS" && $department == "CENAR") {
        $_SESSION["loggedin"] = true;
        header("Location: CBAA.html");
        exit;

    } 
    
    // Check if user is from department CEAS
    else if ($username == "CENTHRE-coordinator" && $password == "CENTHREPASS" && $department == "CEAS") {
        $_SESSION["loggedin"] = true;
        header("Location: CCJE.html");
        exit;
    } 
        // Check if user is from department CENTHRE
    else if ($username == "CENTHRE-coordinator" && $password == "CENTHREPASS" && $department == "CENTHRE") {
        $_SESSION["loggedin"] = true;
        header("Location: CBAA.html");
        exit;

    } 
    
    // Check if user is from department CITEC
    else if ($username == "CITEC-coordinator" && $password == "CITECPASS" && $department == "CITEC") {
        $_SESSION["loggedin"] = true;
        header("Location: CCJE.html");
        exit;
    } 
    
    // Add more conditions for other departments
    
    // If username and password are invalid, show error message
    else {
        $error = "Invalid username or password";
        header("location: login.html");
        exit;
    }
}
?>
