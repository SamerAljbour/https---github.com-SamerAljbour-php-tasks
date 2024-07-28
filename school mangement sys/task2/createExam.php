<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db 2.php';

$subjectID = isset($_POST['subjectID']) ? $_POST['subjectID'] : "";
$examDate = isset($_POST['examDate']) ? $_POST['examDate'] : "";
$maxScore = isset($_POST['maxScore']) ? $_POST['maxScore'] : "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "INSERT INTO exams (subject_id ,exam_date,max_score) VALUES
    ('$subjectID','$examDate','$maxScore')";
    $result = $conn -> exec($sql);
    $id = $conn->lastInsertId();
    $data = [
        "subjectID" => $subjectID,
        'examDate'=> $examDate,
        'maxScore' => $maxScore,
        
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