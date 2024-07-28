<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db 2.php';
// con ? true : false
$name = isset($_POST['name']) ? $_POST['name'] : "";
$class = isset($_POST['class']) ? $_POST['class'] : "";
$dateOfBirth = isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
$contactInfo = isset($_POST['contactInfo']) ? $_POST['contactInfo'] : "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "INSERT INTO students (name ,class,date_of_birth,address,contact_info) VALUES
    ('$name','$class','$dateOfBirth','$address','$contactInfo')";
    $result = $conn -> exec($sql);
    $id = $conn->lastInsertId();
    $data = [
        'id' => $id,
        "name" => $name,
        'class'=> $class,
        'dateOfBirth' => $dateOfBirth,
        'address' => $address,
        'contactInfo' => $contactInfo
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