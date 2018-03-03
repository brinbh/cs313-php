<?php
// connect to database
require "database.php";

// get
function getAllProjects() {
    $db = get_db();
    $query = 'SELECT * FROM project';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $projectData = $stmt->fetchAll();
    $stmt->closeCursor();

    return $projectData;
}

// get images
function getProjImg() {
    $db = get_db();
    $query = 'SELECT i.image_id, i.image_url, i.image_project, p.project_id, p.project_html FROM image i '
            .'INNER JOIN image_project_mapping ip ON ip.image_id = i.image_id '
            .'INNER JOIN project p ON p.project_id = ip.project_id '
            .'WHERE p.project_id = i.image_project';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $projectImg = $stmt->fetchAll();
    $stmt->closeCursor();

    return $projectImg;
}

function getProjectId($projectTitle) {
    $db = get_db();
    $query = 'SELECT project_id FROM project WHERE project_title = ":project_title"';
    echo $query;
    $stmt = $db->prepare($query);
    $stmt->bindValue(':project_title', $projectTitle);
    $stmt->execute();
    $projectId == $stmt->fetchAll();
    $stmt->closeCursor();
    echo $projectId."<br>";
    return $projectId;
}

function addImage($projectTitle) {
    //get project id
    $imageProject = getProjectId($projectTitle);
    $imageUrl = "https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";

    $db = get_db();
    $query = 'INSERT INTO image (image_url, image_project) '
              .'VALUES (:image_url, :image_project)';
    echo $query;
    echo "<br>";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':image_url', $imageUrl);
    $stmt->bindValue(':image_project', $imageProject);
    $stmt->execute();
    $stmt->closeCursor();

}

// add
function addProject($projectTitle, $projectHtml, $projectDescription) {
    $db = get_db();
//    $projectImg = "https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";
    $portfolioId = 1;
    $query = 'INSERT INTO project (project_title, project_html, project_description, portfolio_id) '
              .'VALUES (:project_title, :project_html, :project_description, :portfolio_id)';
    echo $query;
    echo "<br>";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':project_title', $projectTitle);
    $stmt->bindValue(':project_html', $projectHtml);
    $stmt->bindValue(':project_description', $projectDescription);
    $stmt->bindValue(':portfolio_id', $portfolioId);
    $stmt->execute();
    $stmt->closeCursor();

    addImage($projectTitle);

    return "Thanks for adding $projectTitle!";

}

// delete
function deleteProject($projectId) {
    $db = get_db();
    $query = 'DELETE FROM project WHERE project_id = :project_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':project_id', $projectId);
    $stmt->execute();
    $stmt->closeCursor();

    return "$portfolioId has been deleted!";

}

// update

?>