<?php
include './db_connection.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the SQL query
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    
    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Fetch all results
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Output for debugging
    // var_dump($result);
    
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
    exit;
}

header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);
?>

