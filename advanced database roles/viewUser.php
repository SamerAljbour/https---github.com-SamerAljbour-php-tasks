<?php 
include './db_connection.php';
$id = intval($_GET['id']);
$sql = "SELECT id, User_image,Name , Email, date_created , Phone_number FROM users WHERE id = $id";
$stmt =$conn->query($sql);
$result =$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



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
          <th scope="col">User image</th>
          <th scope="col">Name </th>
          <th scope="col">Email </th>
          <th scope="col">date created </th>
          <th scope="col">Phone number  </th>

        </tr>
      </thead>
      <tbody>
        <?php foreach($result as $row): ?>
          <tr>
              <th scope="row"><?= $row['id'] ?></th>
              <td><?= $row['Name'] ?></td>
              <td><?= $row['Name'] ?></td>
              <td><?= $row['Email'] ?></td>
              <td><?= $row['date_created'] ?></td>
              <td><?= $row['Phone_number'] ?></td>
              <td>
              </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
