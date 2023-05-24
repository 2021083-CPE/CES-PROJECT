<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBAA Account |view CENTHRE</title>
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="x-icon" href="https://i.imgur.com/JhcoDAt.png" sizes= 100px>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<section id="header">
    <a href="../index.html"><img src="../../CESpic/ublpwhite.png" class="logo" height="56"></a>

    <div>
        <ul id="navbar">
            <li><a id="active" href="../index.html">HOME</a></li>
            <li><a id="a1" href="../index.html#about">ABOUT</a></li>
            <li class="dropdown">
                <a href="../index.html#projects" class="dropbtn">PROJECTS</a>
                <div class="dropdown-content">
                    
                    <div class="dropdown">
                        <a href="projects.html" class="completed-projects-btn"></a>
                        <div class="dropdown-content completed-projects-dropdown">
                            
                        </div>
                    </div>
                </div>
            </li>
            <li><a id="active" href="../index.html#contacts">CONTACTS</a></li>
            <li><a id="active" href="#notif">Volunteers</a></li>
            <li><a id="active" href="../../login.html">Log out</a></li>
            <i id="close" class="fa-solid fa-xmark"></i>
        </ul>
    </div>

    <div id="mobile">
        <i id="bar" class="fa-solid fa-bars"></i>
    </div>
</section>

    <section id="CBAAprojects">
        <div class="CBAAcontainer">
            <h2>CENTHRE Projects</h2>

            <?php
            // Include the database connection file
            include '../../CENTHRE/database_connection.php';

            // Fetch the projects from the database
            $query = "SELECT * FROM centhre_projects";
            $result = mysqli_query($connection, $query);

            if ($result) {
                // Check if there are any projects in the database
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the projects and display them
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row["title"];
                        $description = $row["description"];
                        $status = $row["status"];
                        $backData = $row["back"];
                        $pictureData = $row["picture"];

                        // Display the project information
                        echo "<div class='project'>";
                        echo "<h3>$title</h3>";
                        echo "<p>$description</p>";
                        echo "<p>Status: $status</p>";
                        echo "<a href='../../CENTHRE/uploads/" . $row['backname'] . "' target='_blank'>View</a>";
                        echo "<div class='buttons'>";
                        if ($status === 'ongoing') {
                            echo "<button class='join-button' onclick=\"toggleJoinForm('$title')\" style='z-index: 2'>Join Now</button>";

                        }
    
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
            if (isset($_GET['success'])) {
                echo "<p>Successfully joined the project.</p>";
              } elseif (isset($_GET['error'])) {
                echo "<p>Error: There was an error joining the project.</p>";
              }

            // Close the database connection
            mysqli_close($connection);
            ?>
        </div>
    </section>

    <!-- Add your footer here -->
    <div class="footer-clean">
      <footer>
          <div class="container1">
              <div class="row">
                  <div class="col-sm-4 col-md-3 item">
                      <h6>Community Connect</h6>
                      <p class="copyright">All rights reserved by Ub Lipa CES ©2023</p>
                  </div>
              </div>
          </div>
      </footer>
  </div>

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
            padding-top: 40px;
            z-index: -1;
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
            margin-right: 340px;
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../script.js"></script>
</body>

</html>
