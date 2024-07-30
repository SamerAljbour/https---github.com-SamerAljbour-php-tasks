<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require './connection_db.php';

if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    $input = file_get_contents('php://input');
    $result = json_decode($input,true);
    $id = isset($result['id']) ? $result['id'] : "";
    $name = isset($result['name']) ? $result['name'] : "";
    $salary = isset($result['salary']) ? $result['salary'] : "";
    $dayoff = isset($result['dayoff']) ? $result['dayoff'] : "";


    $sql = "UPDATE employees  SET name = '$name' , salary = '$salary' , dayoff = '$dayoff' WHERE id = '$id'";
    $result = $conn->exec($sql);
    $data =[
        "message" => "updated info"
    ];
    echo json_encode($data , true);
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}
?>