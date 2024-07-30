<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require './connection_db.php';

$name = isset($_POST['name']) ? $_POST['name'] : "";
$salary = isset($_POST['salary']) ? $_POST['salary'] : "";
$dayoff = isset($_POST['dayoff']) ? $_POST['dayoff'] : "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "INSERT INTO employees (name ,salary ,dayoff) VALUES
    ('$name','$salary','$dayoff')";
    $result = $conn -> exec($sql);
    $id = $conn->lastInsertId();
    $data = [
        "id" => $id,
        "name" => $name,
        'salary'=> $salary,
        'dayoff' => $dayoff,
        
    ];
    echo json_encode ($data , true);
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}
?>