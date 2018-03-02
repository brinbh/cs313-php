<?php
// connect to database
require "database.php";

// get
function getAllProjects() {
    echo " getAllProjects()";
    $db = get_db();
    $query = 'SELECT project_id, project_title, project_html, project_description'
            .'FROM project';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $projectData = $stmt->fetchAll();
    $stmt->closeCursor();

    return $projectData;
}

//// get images
//function getProjImg() {
//    $db = get_db();
//    $query = 'SELECT image_id, image_url, image_project FROM image i'
//            .'INNER JOIN image_project_mapping ip ON ip.image_id = i.image_id
//            .'WHERE ip.project_id = i.image_project';
//    $stmt = $db->prepare($query);
//    $stmt->execute();
//    $projectImg = $stmt->fetchAll();
//    $stmt->closeCursor();
//
//    return $projectImg;
//}

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