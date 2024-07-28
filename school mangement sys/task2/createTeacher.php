<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require "../connection_db 2.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $subjectId = isset($_POST['subjectId']) ? $_POST['subjectId'] : "";
    $ContactInfo = isset($_POST['ContactInfo']) ? $_POST['ContactInfo'] : "";

    // echo $name;
    $sql = "INSERT INTO  teachers (name,subject_id,contact_info) VALUES 
    ('$name','$subjectId','$ContactInfo')";
    $result = $conn->exec($sql);
    $data=[
        "message" => "inserted successfully",
       'status' =>  http_response_code() ,
       "name" => $name,
       "subjectId" => $subjectId,
       "ContactInfo" => $ContactInfo,

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