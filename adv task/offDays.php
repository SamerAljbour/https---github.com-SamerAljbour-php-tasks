<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require './connection_db.php';
$id = isset($_GET['id']) ? $_GET['id'] : "";
if($_SERVER['REQUEST_METHOD'] =='GET'){
    $sql = "SELECT id,salary ,dayoff FROM employees";
    $result = $conn->query($sql);
    $output = $result-> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($output , true);

}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}

?>