<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Employees";

include 'db_connection.php';

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
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT id, name, address, salary FROM employee_details";
      ?>
      <tbody>
        <?php foreach($conn->query($sql) as $row): ?>
          <tr>
              <th scope="row"><?= $row['id'] ?></th>
              <td><?= $row['name'] ?></td>
              <td><?= $row['address'] ?></td>
              <td><?= $row['salary'] ?></td>
              <td>
              <a href="view_employee.php?id=<?= $row['id'] ?>" class="btn btn-primary">View</a>
              <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-success">update</a>
              <a href="view_employee.php?id=<?= $row['id'] ?>" class="btn btn-danger">delete</a>
              
                  
                </button>
              </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
