<?php
// logout.php

// Perform any necessary logout actions (e.g., destroying session, clearing cookies)
// Example: Destroying the session
session_start();
session_destroy();

// Redirect back to the login page
header("Location: ../index.html");
exit();
?>
