<?php
require '../connection_db 2.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $sql = "SELECT * FROM teachers";
    $stmt =$conn-> query($sql);
    $result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result,true);
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}
?>