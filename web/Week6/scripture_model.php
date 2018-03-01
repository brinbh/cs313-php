<?php

print "scripture_model.php";
function insertScripture(){}
function getScriptureByTopic(){}
function getAllScriptures(){

    $sql = $db->query('SELECT scriptures_book, scriptures_chapter, scriptures_verse, scriptures_content FROM ta.scriptures;');

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $scriptures = $stmt->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $scriptures;
}

?>