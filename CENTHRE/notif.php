<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CENTHRE Projects</title>
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="x-icon" href="https://i.imgur.com/JhcoDAt.png" sizes=100px>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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


    <?php
include 'database_connection.php';
// Fetch the projects from the database
$query = "SELECT * FROM centhre_projects";
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

            // Display the project information
            // ...

            echo "<div class='volunteers-section'>";
            echo "<h4>$title</h4>";
            

            // Retrieve the volunteers for the current project
            $volunteersQuery = "SELECT * FROM centhre_volunteers WHERE project_title = '$title'";
            $volunteersResult = mysqli_query($connection, $volunteersQuery);

            if ($volunteersResult) {
                // Check if there are any volunteers for the project
                if (mysqli_num_rows($volunteersResult) > 0) {
                    echo "<ul class='volunteers-list'>";
                    while ($volunteerRow = mysqli_fetch_assoc($volunteersResult)) {
                        $volunteerName = $volunteerRow['name'];
                        $volunteerEmail = $volunteerRow['email'];
                        $volunteerProjectTitle = $volunteerRow['project_title'];
                        $volunteerDepartment = $volunteerRow['department']; // Add this line

                        echo "</li><strong>Name:</strong> $volunteerName <br> <strong>Email:</strong> $volunteerEmail <br> <strong>Department:</strong> $volunteerDepartment <br><br>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No volunteers found for this project.</p>";
                }

                // Free the result set
                mysqli_free_result($volunteersResult);
            } else {
                echo "<p>Error: " . mysqli_error($connection) . "</p>";
            }

            echo "</div>";
            // ...
        }
    } else {
        echo "<p>No projects found.</p>";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    echo "<p>Error: " . mysqli_error($connection) . "</p>";
}
?>

    <style>
        .volunteers-section {
            margin: 125px;
        }

        .volunteers-list {
            list-style: none;
            padding-left: 0;
        }

        .volunteers-list li {
            margin-bottom: 8px;
        }

        h4 {
            margin: 10px;
            font-size: 45px;
            color: rgb(249,174,59);
            text-align: center;
        }
    </style>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>
