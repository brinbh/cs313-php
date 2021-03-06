<?php
    require "db/project_model.php";
//    $projects = getAllProjects();
    $images = getProjImg();
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
                    foreach ($images as $image) {
                        print "<div class='img-container'>";
                        print "<a href='".$image['project_html']."' >";
                        print "<img class='project-img' src='".$image['image_url']."' alt='";
                        print $image['project_title']."' >";
                        print "</a>";
                        print "</div>";
                    }
                ?>

            </div>
        </div>
        <footer>
            <!--Contact Info /-->
            <!--Navigation? /-->
            <!--Link to Print Resume/-->
        </footer>
    </body>

</html>