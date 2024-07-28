<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
include './db_connection.php';
$name = isset($_POST['name']) ? $_POST["name"] : "";
// echo $id;
$sql = 'SELECT * FROM phones where name LIKE :id';
$stmt = $conn->prepare($sql);
$searchTerm = "%{$name}%";
$stmt->bindParam(':id', $searchTerm);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $result =  json_decode($result , true);
$response = [];
// foreach ( $result as $phone){
//     if(stripos($result['name'],$name) == 0){
//         $response[]= $result['name'];
//     }
// }
// $phone = $result->fetchAll(PDO::FETCH_ASSOC);
// print_r( var_dump($result));
echo json_encode($result , true);
?>