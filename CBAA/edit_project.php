<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBAA Projects</title>
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="x-icon" href="https://i.imgur.com/JhcoDAt.png" sizes="100px">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add Project Form */
        #add-project {
            padding: 20px;
        }

        #add-project h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        select {
            margin: 20px;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        input [type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        
        .container5 h3 {
            text-align: center;
        }

        #cbaa {
            position: relative;
            padding: 90px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1000px;
            z-index: 1;
            padding-top: 4%;
            flex-direction: column;
        }

        .text {
            text-align: center;
        }
        .cbaa h6 {
            margin: 36px;
            font-size: 50px;
            color: rgb(249, 174, 59);
            text-align: center;
        }

        /* CSS */
        #add-btn {
            background-color: #f8f9fa;
            border: 1px solid #f8f9fa;
            border-radius: 4px;
            color: #3c4043;
            cursor: pointer;
            font-family: arial, sans-serif;
            font-size: 14px;
            height: 36px;
            line-height: 27px;
            min-width: 54px;
            padding: 0 16px;
            text-align: center;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: pre;
        }

        #add-btn:hover {
            border-color: #dadce0;
            box-shadow: rgba(0, 0, 0, .1) 0 1px 1px;
            color: #202124;
        }

        #add-btn:focus {
            border-color: #4285f4;
            outline: none;
        }
        <style>
        #CBAAprojects {
    background-color: #f2f2f2;
        }

        .CBAAcontainer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        .project {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding: 8px;
            margin-bottom: 20px;
            color: #fff;
            position: relative;
            height: 400px;
            width: 450px;
        }
        .project a {
            position: relative;
            z-index: 2;
        }

        p {
            font-size: 16px;
            color: #000;
        }

        .title {
            font-weight: bold;
            text-align: center;
        }
        h2:after{
            background-color: rgb(249 174 59 / 0%);
        }

        h2 {
            text-align: center;
            color: rgb(249 174 59);
        }
        .project h3 {
            font-size: 23px;
            text-align: center;
            color: rgb(249 174 59);
            margin: 15px;
        }
        .project img {
            padding-top: 128px;
        }

        .buttons {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        }

        .edit-button,
        .delete-button {
            padding: 8px 16px;
            margin-right: 147px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-button:hover,
        .delete-button:hover {
            background-color: #45a049;
        }

        h3 {
            color: #350202;
            font-size: 19px;
            padding-left: 10px;
            

        }
        h3 .input{
            cursor: none;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
    </style>
</head>

<body>

    <section id="header">
        <a href="index.html"><img src="https://i.imgur.com/lP5ZG7C.png" class="logo" height="56"></a>

        <div>
            <ul id="navbar">
                <li><a id="active" href="index.html">HOME</a></li>
                <li><a id="a1" href="index.html#about">ABOUT</a></li>
                <li class="dropdown">
                    <a href="index.html#projects" class="dropbtn">PROJECTS</a>
                    <div class="dropdown-content">

                        <div class="dropdown">
                            <a href="projects.html" class="completed-projects-btn"></a>
                            <div class="dropdown-content completed-projects-dropdown">

                            </div>
                        </div>
                    </div>
                </li>
                <li><a id="active" href="index.html#contacts">CONTACTS</a></li>
                <li><a id="active" href="#notif">Volunteers</a></li>
                <li><a id="active" href="logout.php">Log out</a></li>
                <i id="close" class="fa-solid fa-xmark"></i>
            </ul>
        </div>

        <div id="mobile">
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>

<?php
// Include the database connection file
include 'database_connection.php';

// Check if the project title is provided in the URL
if (isset($_GET['title'])) {
    $title = $_GET['title'];

    // Fetch the project details from the database
    $query = "SELECT * FROM cbaa_projects WHERE title = '$title'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Project found, display the edit form or perform the edit operation

        // Display the edit form with the project details
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row["title"];
            $description = $row["description"];
            $status = $row["status"];
            // ... retrieve other project details as needed

            // Display the edit form with the project details
            echo "<div class='cbaa'>";
            echo "<h6>Edit Project</h6>";
            echo "</div>";
            echo "<form action='update_database.php' method='POST'>";
            echo "<h3>Title: <input type='text' name='title' value='$title'><br></h3>";
            echo "<h3>Description: </h3><textarea name='description'>$description</textarea><br>";
            echo "<h3>Status: </h3>";
            echo "<select name='status'>";
            echo "    <option value='ongoing'". ($status === 'ongoing' ? ' selected' : '') .">Ongoing</option>";
            echo "    <option value='completed'". ($status === 'completed' ? ' selected' : '') .">Completed</option>";
            echo "</select><br>";
            // ... add other fields as needed
            echo "<button><input type='submit' value='Save'></button>";
            echo "</form>";
            
        }
    } else {
        // Project not found
        echo "Project not found.";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    // Project title not provided
    echo "Project title not provided.";
}

// Close the database connection
mysqli_close($connection);
?>


<div class="footer-clean">
        <footer>
            <div class="container1">
                <div class="row">
                    <div class="col-sm-4 col-md-3 item">
                        <h6>Community Connect</h6>
                        <p class="copyright">
                            All rights reserved by Ub Lipa CES ©2023
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="script.js"></script>

    </body>

</html>