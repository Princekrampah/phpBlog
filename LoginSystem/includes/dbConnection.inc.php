<?php

$HOSTNAME = "127.0.0.1";
$USERNAME = "root";
$PASSWORD = "Kigomadatabase2020";
$DATABASENAME = "myphpblog";

$settings = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
);

$dataSource = "mysql:dbname=" . $DATABASENAME . ";host=" . $HOSTNAME . ";charset=utf8";

$connection = null;

try {
    $connection = new PDO($dataSource, $USERNAME, $PASSWORD, $settings);
    echo "Connection established";
} catch (PDOException $ex) {
    $connection = null;
    echo "[Error] " . $ex->getMessage();
}
