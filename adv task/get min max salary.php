<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require './connection_db.php';

if($_SERVER['REQUEST_METHOD'] =='GET'){
    $sql = "SELECT MIN(salary) as minSalary ,MAX(salary) as maxSalary ,SUM(salary) as totalSalary ,COUNT(id) as numberOfEmployees FROM employees";
    $result = $conn->query($sql);
    $output = $result-> fetch(PDO::FETCH_ASSOC);
    echo json_encode($output ,true );

}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}
?>