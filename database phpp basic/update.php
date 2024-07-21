<?php
include './db_connection.php';
$id = $_GET['id'];
$sql = "SELECT * FROM employee_details WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$data = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['nameUP']))
$data['name'] = $_POST['nameUP'];
else
$_POST['nameUP']="";
if(isset($_POST['addressUP']))
$data['address'] = $_POST['addressUP'];
else
$_POST['addressUP']="";
if(isset($_POST['salaryUP']))
$data['salary'] = $_POST['salaryUP'];
else
$_POST['salaryUP']="";


$sql = "UPDATE employee_details SET name = :name, address = :address, salary = :salary WHERE id = :id";

$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bindParam(':name', $data['name']);
$stmt->bindParam(':address', $data['address']);
$stmt->bindParam(':salary', $data['salary']);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Execute the statement
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <style>
      body {
        margin: 3%;
      }
    </style>
    <title>Document</title>
  </head>
  <body>
    <form method="POST" action="">
      <div class="mb-3">
        <label for="exampleInputFirstName1" class="form-label">Name</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputFirstName1"
          name="nameUP"
          value="<?= htmlspecialchars($data['name'])?>"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">address</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          name="addressUP"
          value="<?= htmlspecialchars($data['address'])?>"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">salary</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          name="salaryUP"
          value="<?= ($data['salary'])?>"
        />
      </div>
      
      <button type="submit" class="btn btn-primary">update
      
      </button>
    </form>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script>
        
    </script>
  </body>
</html>

