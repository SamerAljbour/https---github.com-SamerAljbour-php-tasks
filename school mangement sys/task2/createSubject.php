<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require "../connection_db 2.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $desc = isset($_POST['description']) ? $_POST['description'] : "";
    
    // echo $name;
    $sql = "INSERT INTO  subjects (name,description) VALUES 
    ('$name','$desc')";
    $result = $conn->exec($sql);
    $data=[
        "message" => "inserted successfully",
       'status' =>  http_response_code() ,
       "name" => $name,
       "description" => $desc,

    ];
    echo json_encode($data ,true);
    
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true); 
}

?>