<?php 
$input = file_get_contents("http://127.0.0.1/PHP%20tasks/adv%20task/offDays.php");
$result = json_decode($input , true);
// var_dump($result);
foreach($result as $row){
    $id= $row['id'];
    $dayoff = $row['dayoff'];
    $salary = $row['salary'];

    $salaryDay = $salary / 30;
    $res = $salaryDay *(30 - $dayoff);
    $salary =$res;
    echo $salary . "<br>";
}
?>
