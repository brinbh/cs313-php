<?php
// connect to database
require "database.php";
//print "ImageModel";

 get
function getAllImages() {
    print "getAllImages()";
    $db = get_db();
    $stmt = $db->prepare("SELECT image_id,
                         image_url,
                         image_project
                         FROM portfolio.image");
    $stmt->execute();
    $imageData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $imageData;
}

// delete
// update
// add
?>