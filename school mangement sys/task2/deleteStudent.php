<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: DELETE');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db 2.php';
if ($_SERVER['REQUEST_METHOD'] == "DELETE"){
    $input = file_get_contents('php://input');
    $inputRes = json_decode($input , true);
    $id = isset($inputRes['id']) ? $inputRes['id'] : "";
    $sql = "DELETE FROM students WHERE id = '$id'";
    $conn -> exec($sql);
    $data = [
        'message' => 'Deleted'
        
    ];
    echo json_encode($data,true);
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}

?>