<?php 
require './connection_db.php';
$id = isset($_POST['employeeId']) ? $_POST['employeeId'] : "";
$amount = isset($_POST['amount']) ? $_POST['amount'] : "";
$action = isset($_POST['action']) ? $_POST['action'] : "";
$allEmployees = isset($_POST['allEmployees']) ? $_POST['allEmployees'] : "";
$opeartion = $action =="increase" ? "+" : "-";
// echo $_POST['amount'];
// echo $_POST['action'];
// echo $_POST['employeeId'];
// echo $_POST['allEmployees'] ; // gives on

    $sql;
    if($allEmployees == "on"){
    $sql = "UPDATE employees 
SET salary = salary $opeartion '$amount' ";
    }else {
    $sql = "UPDATE employees 
SET salary = salary $opeartion '$amount'
WHERE id =$id";
    }
    $result = $conn->query($sql);
    $output = $result->fetch(PDO::FETCH_ASSOC);
    json_encode($output , true);
 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employees Information</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 400px;
      }
      h1 {
        color: #d12a2a;
      }
      h2 {
        color: #333;
        margin-top: 0;
      }
      label {
        display: block;
        text-align: left;
        margin: 15px 0 5px;
        font-weight: bold;
      }
      input[type="text"],
      select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      input[type="checkbox"] {
        margin-left: 10px;
      }
      .buttons {
        display: flex;
        justify-content: space-between;
      }
      .buttons button {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }
      .buttons .update-btn {
        background-color: #28a745;
        color: white;
      }
      .buttons .cancel-btn {
        background-color: #dc3545;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Employees Information</h1>
      <h2>Update Salary</h2>
      <form action="./update salary.php" method="POST">
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" />

        <label for="action">Action:</label>
        <select id="action" name="action">
          <option value="increase">Increase</option>
          <option value="decrease">Decrease</option>
        </select>

        <label for="employeeId">Employee id:</label>
        <input type="text" id="employeeId" name="employeeId" />

        <label for="allEmployees">
          <input type="checkbox" id="allEmployees" name="allEmployees" /> All
          employees
        </label>

        <div class="buttons">
          <button type="submit" id="update-btn" class="update-btn">
            Update
          </button>
          <button type="button" id="cancel-btn" class="cancel-btn">
            Cancel
          </button>
        </div>
      </form>
    </div>
    
  </body>
</html>
