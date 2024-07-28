

<?php
include './db_connection.php';
try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  
    $sql = "SELECT * FROM users;";
    $result = $conn->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
  
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

header('Content-Type: application/json');
echo json_encode($result ,true);
?>

