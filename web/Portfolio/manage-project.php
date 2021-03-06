<?php
    session_start();
    require "db/project_model.php";
    $images = getProjImg();

    if (isset($_POST['add-project'])) {
        $pTitle = (string)$_POST['pTitle'];
        $pHtml = (string)$_POST['pHtml'];
        $pDescription = (string)$_POST['pDescription'];
        $result = addProject($pTitle, $pHtml, $pDescription);
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
                foreach ($images as $image) {
                    print "<div>";
                    print "<img class='project-img-manage' src='".$image['image_url']."' alt='";
                    print $image['project_title']."' >";
                    print "<input type='checkbox' name='delete-project' value='".$image['project_id']."' class='delete'>";
                    print "</div>";
                }
                ?>
                </div>
                <input type="hidden" value="project">
                <input type="submit" class="button" value="Delete">
                </form>
            </div>
            <div class="row">
                <h2>Add a New Project</h2>
                <?php echo "$result"; ?>
                <form action="manage-project.php" method="post">
                    <h3>Project Title: </h3><input type="text" name="pTitle" required><br>
                    <h3>Project Url: </h3><input type="text" name="pHtml" required><br>
                    <h3>Project Description: </h3><input type="text" name="pDescription" required>
                    <input type="hidden" name="add-project" value="project">
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