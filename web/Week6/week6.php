<?php
/**********************************************************
* File: viewScriptures.php
* Author: Br. Burton
*
* Description: This file shows an example of how to query a
*   PostgreSQL database from PHP.
***********************************************************/
require "database.php";
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Scripture List</title>
</head>

<body>
<div>

<h1>Scripture Resources</h1>

<?php

$statement = $db->prepare("SELECT scripture_book, scripture_chapter, scripture_verse, scripture_content FROM scriptures");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	echo '<p>';
	echo '<strong>' . $row['scripture_book'] . ' ' . $row['scripture_chapter'] . ':';
	echo $row['scripture_verse'] . '</strong>' . ' - ' . $row['scripture_content'];
	echo '</p>';
}
?>


</div>

</body>
</html>