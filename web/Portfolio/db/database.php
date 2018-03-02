<html>
<body>

<?php
ini_set("log_errors", 1);
ini_set("error_log", "error.log");
error_log( "Hello, errors!" );

function get_db() {
    // default Heroku Postgres configuration URL
    $dbUrl = getenv('DATABASE_URL');

    if (empty($dbUrl)) {
     $dbUrl = "postgres://postgres:postgres@localhost:5432/postgres";
    }

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    try {
     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
     echo "Connects!";
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