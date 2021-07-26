<?php

$HOSTNAME = "127.0.0.1";
$USERNAME = "root";
$PASSWORD = "Kigomadatabase2020";
$DATABASENAME = "myphpblog";

// Resource: PDO Tutorial: https://phpdelusions.net/pdo
// Assemble connection details
$settings = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
);

$dataSource = "mysql:dbname=" . $DATABASENAME . ";host=" . $HOSTNAME . ";charset=utf8";

// Establish database connection
$connection = null;
try {
    $connection = new PDO($dataSource, $USERNAME, $PASSWORD, $settings);
    // echo "Connected...";
} catch (PDOException $ex) {
    $connection = null;
    echo "[ERROR]  "  . $ex->getMessage();
}


?>