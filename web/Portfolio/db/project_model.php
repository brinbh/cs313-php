<?php
// connect to database
require "database.php";
ini_set("log_errors", 1);
ini_set("error_log", "error.log");
error_log( "Hello, errors!" );

// get
function getAllProjects() {
    echo " getAllProjects()";
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
    $query = 'SELECT i.image_id, i.image_url, i.image_project, p.project_id, p.project_url FROM image i '
            .'INNER JOIN image_project_mapping ip ON ip.image_id = i.image_id '
            .'INNER JOIN project p ON p.project_id = ip.project_id '
            .'WHERE p.project_id = i.image_project';
    echo $query;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $projectImg = $stmt->fetchAll();
    $stmt->closeCursor();

    return $projectImg;
}

// add
function addProject($projectTitle, $projectHtml, $projectDescription, $portfolioId, $tagId) {
    $db = get_db();
    $projectImg = "https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";
    $query = 'INSERT INTO portfolio.project (project_title, project_html, project_description, portfolio_id, tag_id, project_img)
              VALUES (:project_title, :project_html, :project_description, :portfolio_id, :tag_id, :project_img)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':project_title', $projectTitle);
    $stmt->bindValue(':project_html', $projectHtml);
    $stmt->bindValue(':project_description', $projectDescription);
    $stmt->bindValue(':portfolio_id', $portfolioId);
    $stmt->bindValue(':tag_id', $tagId);
    $stmt->bindValue(':project_img', $projectImg);
    $stmt->execute();
    $stmt->closeCursor();

    return "Thanks for adding $projectTitle!";

}

// delete
function deleteProject($projectId) {
    $db = get_db();
    $query = 'DELETE FROM portfolio.project WHERE project_id = :project_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':project_id', $projectId);
    $stmt->execute();
    $stmt->closeCursor();

    return "$portfolioId has been deleted!";

}

// update

?>