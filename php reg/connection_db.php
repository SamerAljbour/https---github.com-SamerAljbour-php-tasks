<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="login_test";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
//   $sql = "CREATE DATABASE login_test"; // create database
//   $conn -> exec($sql);
// $sql = 'CREATE TABLE users (id INT (11) PRIMARY KEY AUTO_INCREMENT,name VARCHAR(255),email VARCHAR(255),password INT(11))';
//   $conn -> exec($sql); // created table

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
global $conn;
?>