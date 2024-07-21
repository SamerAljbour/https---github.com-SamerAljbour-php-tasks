
<?php
$flag=  false;
$servername = "localhost";
$username = "root";
$password = "";
$name= $_REQUEST['name'];
$address= $_REQUEST['address'];
$salary= $_REQUEST['salary'];
echo $name;
try {
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./db_connection.php");
}
  $sql = "CREATE DATABASE Employees";
//   $conn->exec($sql);
  echo "<br>";
//   echo "created database Employees";
  $sql_create_table ="
  CREATE TABLE employee_details (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30),
address VARCHAR(30),
salary INT(10))";
//   $conn->exec($sql_create_table);
//  insert data
echo "<br>";
// echo "created table users";

// validation---------------------

// insert ------------
$sql = "INSERT INTO employee_details (name, address ,salary)
VALUES ('$name', '$address', '$salary')";
// use exec() because no results are returned
$conn->exec($sql);
$flag = true;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
<?php
 if($flag)
 // Redirect browser
 header("Location: http://127.0.0.1/PHP%20tasks/database%20phpp%20basic/insert.html");
  
 exit;
 ?>