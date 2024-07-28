<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db 2.php';
if ($_SERVER['REQUEST_METHOD'] == "PUT"){
    $input = file_get_contents('php://input');
    $result = json_decode($input,true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON: ' . json_last_error_msg()]);
        exit;
    }
    $id = isset($result['id']) ? $result['id'] : "";
    $name = isset($result['name']) ? $result['name'] : "";
    $class = isset($result['class']) ? $result['class'] : "";
    $dateOfBirth = isset($result['dateOfBirth']) ? $result['dateOfBirth'] : "";
    $address = isset($result['address']) ? $result['address'] : "";
    $contactInfo = isset($result['contactInfo']) ? $result['contactInfo'] : "";

    $sql = "UPDATE students SET name = '$name' , class ='$class' , date_of_birth = '$dateOfBirth' ,address = '$address' ,contact_info = '$contactInfo'
    WHERE id = '$id'";
    $res = $conn -> exec($sql);
    $data = [
        "name" => $name,
        'class'=> $class,
        'dateOfBirth' => $dateOfBirth,
        'address' => $address,
        'contactInfo' => $contactInfo,
        'message' => ' data updated successfully'
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