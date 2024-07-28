<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db.php';

if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $input = file_get_contents('php://input');
    $inputRes = json_decode($input , true);
    $id = isset($inputRes['id']) ? $inputRes['id'] : "";
    $name = isset($inputRes['name']) ? $inputRes['name'] : "";
    $address = isset($inputRes['address']) ? $inputRes['address'] : "";
    // echo "id " .$id ;
    $sql ="UPDATE students SET name = :name ,address = :address where id = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt -> execute();
    echo json_encode("updated sucessfully");
} else {
    $data = [
        'error' => "Method Not Allowed",
        'status' => 405
    ];
    echo json_encode($data); 
}
?>