<?php
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'dolphin');

try {
    $conn = new PDO("mysql:host=" . DBSERVER . ";dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Unable to connect to MySQL. " . $e->getMessage());
}

?>
