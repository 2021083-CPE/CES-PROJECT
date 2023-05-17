<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $department = $_POST['department'];
  $message = $_POST['message'];

  // Store the message in a file
  $data = "Name: $name\nEmail: $email\nDepartment: $department\nMessage: $message\n\n";
  file_put_contents('messages.txt', $data, FILE_APPEND);

  // Optional: Send a confirmation email to the user

  // Redirect the user back to the index.html page or show a thank you message
  header('Location: index.html');
  exit();
}
?>
