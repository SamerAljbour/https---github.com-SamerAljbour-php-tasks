<?php 
$input = file_get_contents("http://127.0.0.1/PHP%20tasks/adv%20task/get%20min%20max%20salary.php");
// echo var_dump ($input);
$result = json_decode($input , true);
$minSalary = ($result["minSalary"]) ;
$maxSalary = ($result["maxSalary"]) ;
$totalSalary = ($result["totalSalary"]) ;
$numberOfEmployees = ($result["numberOfEmployees"]) ;
// echo var_dump ($result);
// echo $numberOfEmployees;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 200px;
            text-align: center;
        }

        .card h2 {
            margin: 0 0 10px;
        }

        .card p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>MAX Salary</h2>
            <p><?php echo $maxSalary; ?></p>
        </div>
        <div class="card">
            <h2>MIN Salary</h2>
            <p><?php echo $minSalary;?></p>
        </div>
        <div class="card">
            <h2>Total Salary for all employees</h2>
            <p><?php echo $totalSalary;?></p>
        </div>
        <div class="card">
            <h2>Total number of employees</h2>
            <p><?php echo $numberOfEmployees; ?></p>
        </div>
    </div>
</body>
</html>
