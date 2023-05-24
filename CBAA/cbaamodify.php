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
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
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

        #cbaa h6 {
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
            z-index: 1;
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
            font-size: 18px;
            text-align: center;
            color: rgb(249 174 59);
            margin: 10px;
        }
        .project img {
            padding-top: 20px;
            z-index: -2;
        }
        .project p {
            z-index: 2;
        }
        .buttons {
        display: flex;
        justify-content: center;
        margin-top: 30px;
        }

        .edit-button,
        .delete-button,
        .join-button {
            padding: 8px 16px;
            margin-right: 80px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
        }

        .edit-button:hover,
        .delete-button:hover,
        .join-button:hover {
            background-color: #45a049;
        }
        #join-form {
            margin:90px;

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
                <li><a id="active" href="notif.php#notif">Volunteers</a></li>
                <li><a id="active" href="logout.php">Log out</a></li>
                <i id="close" class="fa-solid fa-xmark"></i>
            </ul>
        </div>

        <div id="mobile">
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>

    <div id="cbaa">
        <h6>CBAA PROJECTS</h6>
        <button id="add-btn">Add Project</button>
    </div>

    <!-- Add button to show the form -->
    <section id="cbaaProject">
        <!-- Display the collection of projects here -->

        <!-- Add Project form -->
        <section id="add-project">
            <div class="container5">
                <h3>CBAA PROJECTS</h3>
                <h2>Add Project</h2>
                <form id="add-form" action="add_projects.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select id="status" name="status" required>
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="back">Upload PDF:</label>
                        <input type="file" id="back" name="back" required>
                    </div>
                    <div class="form-group">
                        <label for="picture">Upload your background (Picture):</label>
                        <input type="file" id="picture" name="picture" required>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </section>

    </section>

    



<!-- CBAAprojects section -->
<section id="CBAAprojects">
    <div class="CBAAcontainer">
        <?php
        // Include the database connection file
        include 'database_connection.php';

        // Fetch the projects from the database
        $query = "SELECT * FROM cbaa_projects";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Check if there are any projects in the database
            if (mysqli_num_rows($result) > 0) {
                // Loop through the projects and display them
                while ($row = mysqli_fetch_assoc($result)) {
                    // Project information
                    $title = $row["title"];
                    $description = $row["description"];
                    $status = $row["status"];
                    $backData = $row["back"];
                    $pictureData = $row["picture"];
        
                    // Display project information and buttons
                    echo "<div class='project'>";
                    // Project content
                    echo "<h3>$title</h3>";
                    // Other project details
                    echo "<p>$description</p>";
                    echo "<p><strong>Status: $status</strong></p>";
                    echo "<a href='uploads/" . $row['backname'] . "' target='_blank'>View</a>";

                    echo "<div class='buttons'>";
                    echo "<a href='edit_project.php?title=$title' class='edit-button'>Edit</a>";
                    echo "<a href='delete_project.php?title=$title' class='delete-button'>Delete</a>";
        
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
    </div>
</section>


    <!-- Site footer -->
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
    <script>
        $(document).ready(function () {
            // Hide the add project form initially
            $("#add-project").hide();

            // Toggle the visibility of the add project form when the "Add" button is clicked
            $("#add-btn").click(function () {
                $("#add-project").toggle();
            });
        });

    function editProject(title) {
        // Perform edit operation using the title
        // Example: Redirect to edit_project.php with the title as a parameter
        window.location.href = "edit_project.php?title=" + title;
    }

    function deleteProject(title) {
        // Perform delete operation using the title
        // Example: Redirect to delete_project.php with the title as a parameter
        window.location.href = "delete_project.php?title=" + title;
    }
    function openJoinForm(title) {
        // Display the join form container
        document.getElementById("join-form-container").style.display = "block";

        // Set the project title in the form
        document.getElementById("project-title").value = title;
    }

    </script>
</body>

</html>
