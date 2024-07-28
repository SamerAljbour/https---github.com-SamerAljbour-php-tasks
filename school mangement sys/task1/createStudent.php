<?php
header('Content-Type: application/json');
require '../connection_db.php';

$name = isset($_POST['name']) ? $_POST['name'] : "";
$date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$contact_info = isset($_POST['contact_info']) ? $_POST['contact_info'] : "";

try {
    $sql = "INSERT INTO students (name, date_of_birth, address, contact_info) VALUES (:name, :date_of_birth, :address, :contact_info)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':contact_info', $contact_info);

    if ($stmt->execute()) {

        header("HTTP/1.1 201 Created");
echo "{ 'message' : 'User Created' ,
        'status' : " . http_response_code() . "
}";
    } else {
        echo json_encode(['error' => 'Failed to add student']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
