<?php
require '../connection_db 2.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = isset($_GET['id']) ? intval( $_GET['id']) : "";
    $sql = "SELECT * FROM teachers WHERE teacher_id= '$id'";
    $stmt =$conn-> query($sql);
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result,true);
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}
?>