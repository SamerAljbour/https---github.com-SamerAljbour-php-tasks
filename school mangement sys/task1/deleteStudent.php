<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db.php';
if ($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $input = file_get_contents('php://input');
    $result = json_decode ($input ,true);
    $id = isset($result['id']) ? $result['id'] : "";

    // echo $id;
    $sql = "DELETE FROM students WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);  
    $stmt -> execute();
    echo json_encode ("Deleted sucessfully"); 

}else {
    $data = [
        'error' => "Method Not Allowed",
        'status' => 405
    ];
    echo json_encode($data);
}
?>