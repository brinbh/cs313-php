<?php
    require "db/project_model.php";
//    require "db/image_model.php";
    $projects = getAllProjects();
//    $images = getAllImages();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta title="Brittany's Portfolio">
        <link rel="stylesheet" type="text/css" href="css/main-style.css">
        <link rel="stylesheet" type="text/css" href="css/skills.css">
    </head>
    <body>
        <header>
            <!--Logo /-->
            <!--Navigation? /-->
            <div class="menu">
            <h1>Hi, my name is Brittany</h1>
            <a href="manage-project.php" class="manage-project button">Manage Projects</a>
            <a href="login.php" class="button">Login</a>
            </div>
        </header>
        <!--Body /-->
        <div class="content">
            <div class="row">
                <div class="skills">
                    <div>
                        <p>HTML 5</p>
                        <div class="level seventy-five"></div>
                    </div>
                    <div>
                        <p>CSS 3</p>
                        <div class="level one-hundred"></div>
                    </div>
                    <div>
                        <p>Javascript</p>
                        <div class="level fifty"></div>
                    </div>
                    <div>
                        <p>Polymer 2</p>
                        <div class="level twenty-five"></div>
                    </div>
                    <div>
                        <p>Angular JS</p>
                        <div class="level twenty-five"></div>
                    </div>
                    <div>
                        <p>Illustrator</p>
                        <div class="level seventy-five"></div>
                    </div>
                    <div>
                        <p>InDesign</p>
                        <div class="level seventy-five"></div>
                    </div>
                    <div>
                        <p>Photoshop</p>
                        <div class="level fifty"></div>
                    </div>
                </div>
            </div>
            <div class="row projects-container">
                <!-- Projects /-->

                <?php
                foreach ($projects as $project) {
                echo "<div class='img-container'>";
                echo "<a href='".$project['project_html']."' >";
                echo "<img class='project-img' src='".$project['project_img']."'></a>";
                echo "</div>";
                }?>

            </div>
        </div>
        <footer>
            <!--Contact Info /-->
            <!--Navigation? /-->
            <!--Link to Print Resume/-->
        </footer>
    </body>

</html>