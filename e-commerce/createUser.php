<?php 
include './db_connection.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    
    $sql = "INSERT INTO users(email, password) VALUES('$email', '$password')";
    $result = $conn->exec($sql);    

header("HTTP/1.1 201 Created");
echo "{ 'message' : 'User Created' ,
        'status' : " . http_response_code() . "
}";
} else {
    $data = [
        'status' => "405",
        'message' => 'Method Not Allowed'
    ];
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode($data);
}
?>