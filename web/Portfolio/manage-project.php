<?php
    session_start();
    require "db/project_model.php";
    $projects = getAllProjects();
    if (isset($_POST['ptitle']) &&
        isset($_POST['pHtml']) &&
        isset($_POST['pDescription']) &&
        isset($_POST['portfolioId']) &&
        isset($_POST['tagId'])) {
        $pTitle = (string)$_POST['ptitle'];
        $pHtml = (string)$_POST['pHtml'];
        $pDescription = (string)$_POST['pDescription'];
        $portfolioId = (int)2;
        $tagId = (int)$_POST['tagId'];

        $result = addProject($pTitle, $pHtml, $pDescription, $portfolioId, $tagId);
        echo "<meta http-equiv='refresh' content='0'>";

    } else {
        $result = "You need to fill out all the fields.";
    }
    if (isset($_POST['delete-project'])) {
        deleteProject($_POST['delete-project']);
        echo "<meta http-equiv='refresh' content='0'>";
    }




?>
<html>
    <head>
        <meta title="Brittany's Portfolio">
        <link rel="stylesheet" type="text/css" href="css/main-style.css">
        <link rel="stylesheet" type="text/css" href="css/sub-style.css">
    </head>
    <body style="background-color: #F2F1EF;">
        <header>
            <!--Logo /-->
            <!--Navigation? /-->
            <div class="menu">
            <h1>Manage Projects</h1>
            <a href="index.php" class="button">Home</a>
            </div>
        </header>
        <!--Body /-->
        <div class="content">
            <div class="row">
                <h2>Current Projects</h2>
                <p>Select to delete project.</p>
                <form action="manage-project.php" method="post">
                <div class="projects">
                <?php
                    foreach ($projects as $project) {
                        echo "<div><a href='".$project['project_html']."' >";
                        echo "<img class='project-img-manage' src='".$project['project_img']."'></a>";
                        echo "<input type='checkbox' name='delete-project' value='".$project['project_id']."' class='delete'></div>";
                }?>
                </div>
                <input type="hidden" value="project">
                <input type="submit" class="button" value="Delete">
                </form>
            </div>
            <div class="row">
                <h2>Add a New Project</h2>
                <?php echo "$result"; ?>
                <form action="manage-project.php" method="post">
                    <h3>Project Title: </h3><input type="text" name="ptitle"><br>
                    <h3>Project Url: </h3><input type="text" name="pHtml"><br>
                    <h3>Project Description: </h3><input type="text" name="pDescription">
                    <h3>Portfolio Id: </h3><input type="text" name="portfolioId">
                    <h3>Tag Id: </h3><input type="text" name="tagId">
                    <input type="hidden" name="action" value="project">
                    <input class="button" type="submit">
                </form>
            </div>
        </div>
        <footer>
            <!--Contact Info /-->
            <!--Navigation? /-->
            <!--Link to Print Resume/-->
        </footer>
    </body>

</html>