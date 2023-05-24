<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Messages</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" type="x-icon" href="../CESpic/CESlogo.png" sizes=100px>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .message {
            margin: 31px 97px 30px 90px;
            padding: 10px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
        }

        .message h4 {
            margin: 0;
            font-size: 18px;
        }

        .message p {
            margin: 5px 0;
            font-size: 14px;
            color: #440303;
        }

        .message .message-details {
            display: none;
            padding: 10px;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }

        .message .message-details p {
            margin: 5px 0;
        }

        .message .message-details .line-bar {
            border-top: 1px solid #ddd;
            margin: 10px 0;
        }

        .message .message-details .back-link {
            display: block;
            margin-top: 10px;
            text-decoration: underline;
            color: blue;
            cursor: pointer;
            
        }

    </style>
    <section id="header">
    <a href="index.html"><img src="../CESpic/ublpwhite.png" class="logo" height="56"></a>

    <div>
        <ul id="navbar">
            <li><a id="active" href="admin.html">HOME</a></li>
            <li><a id="a1" href="admin.html#about">ABOUT</a></li>
            <li class="dropdown">
                <a href="admin.html#projects" class="dropbtn">PROJECTS</a>
                <div class="dropdown-content">
                    <div class="dropdown">
                        <a href="projects.html" class="completed-projects-btn"></a>
                        <div class="dropdown-content completed-projects-dropdown"></div>
                    </div>
                </div>
            </li>
            <li><a id="active" href="admin.html#contacts">CONTACTS</a></li>
            <li><a id="active" href="messages.php">Message</a></li>
            <li><a id="active" href="../login.html">Log out</a></li>
            <i id="close" class="fa-solid fa-xmark"></i>
        </ul>
    </div>

    <div id="mobile">
        <i id="bar" class="fa-solid fa-bars"></i>
    </div>
</section>

<div class="messages-container" style = "height: 90vh;">
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ces";

    // Create a new MySQLi object
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Retrieve messages from the database
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each message
    while ($row = $result->fetch_assoc()) {
        $messageId = $row['id']; // Get the ID column value
        $name = $row['name'];
        $email = $row['email'];
        $department = $row['department'];
        $message = $row['message'];
        ?>
        <div class="message">
            <input type="checkbox" class="message-checkbox" value="<?php echo $messageId; ?>">
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Department:</strong> <?php echo $department; ?></p>
            <p><strong>Message:</strong> <?php echo $message; ?></p>
            <a href="#" class="delete-btn">Delete</a>
        </div>
        <?php
    }
} else {
    echo "<p>No messages found.</p>";
}


// Close the database connection
$conn->close();
?>
</div>

<div class="footer-clean">
    <footer>
        <div class="container1">
            <div class="row">
                <div class="col-sm-4 col-md-3 item">
                    <h6>Community Connect</h6>
                    <p class="copyright">All rights reserved by Ub Lipa CES
                        ©2023</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    // Get all delete buttons
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Attach click event listener to each delete button
    deleteButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const message = button.closest('.message');
            const messageCheckbox = message.querySelector('.message-checkbox');
            const messageId = messageCheckbox.value;

            // Send an AJAX request to delete the message
            deleteMessage(message, messageId);
        });
    });

    // Function to delete the message using AJAX
    function deleteMessage(messageElement, messageId) {
        // Send an AJAX request to delete the message
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../delete_message.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Message deleted successfully
                messageElement.remove();
            } else {
                // Error occurred while deleting the message
                console.log('Error:', xhr.responseText);
            }
        };
        xhr.send('message_id=' + encodeURIComponent(messageId));
    }
</script>
