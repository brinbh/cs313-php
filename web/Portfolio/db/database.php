<html>
<body>

<?php

function get_db() {
    // default Heroku Postgres configuration URL
    $dbUrl = getenv('DATABASE_URL');

    echo "in get_db() and url is $dbUrl";

    if (empty($dbUrl)) {
     $dbUrl = "postgres://postgres:postgres@localhost:5432/postgres";
     echo "is empty and url is $dbUrl";
    }

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    try {
     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
     print "<p>error: $ex->getMessage() </p>\n\n";
     die();
    }

    return $db;

}
?>

</body>
</html>