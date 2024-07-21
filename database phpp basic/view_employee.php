
<?php 

include("./db_connection.php");

$id = intval($_GET['id']); 
$sql = "SELECT id, name, address, salary FROM employee_details where id= $id";

?>
<?php 
$id = $_GET['id'];
$name = $_GET['name'];
$address = $_GET['address'];
$salary = $_GET['salary'];

$sql = "UPDATE employee_details SET name='$name' , address='$address' ,salary = '$salary' WHERE id=$id";
$conn->exec($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <style>
      body {
        margin: 3%;
      }
    </style>
    <title>Document</title>
</head>
<body>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">address</th>
          <th scope="col">salary</th>
        </tr>
      </thead>
      <?php
      $stmt = $conn->query($sql);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <tbody>
        <?php foreach($result as $row): ?>
          <tr>
              <th scope="row"><?= $row['id'] ?></th>
              <td><?= $row['name'] ?></td>
              <td><?= $row['address'] ?></td>
              <td><?= $row['salary'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


