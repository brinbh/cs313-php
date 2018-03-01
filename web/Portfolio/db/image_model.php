<?php
// connect to database
require "database.php";
print "ImageModel";

 get
function getAllImages() {
    print "getAllImages()";
    $db = get_db();
    $query = "SELECT image_id, image_url, image_project FROM image";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $projectData = $stmt->fetchAll();
    $stmt->closeCursor();

    return $imageData;
}

// delete
// update
// add
?>