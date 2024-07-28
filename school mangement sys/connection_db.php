<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_mangment_sys";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected to $dbname";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
global $conn;
?>
