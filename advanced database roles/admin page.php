<?php 
include './db_connection.php';
$id = intval($_GET['id']);
// delete section
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM users WHERE id=$id";
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
      img{
        width: 200px;
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
          <th scope="col">opeartion </th>
        </tr>
      </thead>
      <?php
      $sql = "SELECT id, User_image,Name , Email, date_created , Phone_number FROM users";
      ?>
      <tbody>
        <?php foreach($conn->query($sql) as $row): ?>
          <tr>
              <th scope="row"><?= $row['id'] ?></th>
              <td>
                <?php if (!empty($row['User_image'])): ?>
                    <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($row['User_image']); ?>" alt="User Image" />
                <?php else: ?>
                    <img src="./def.png" alt="Default Image" />
                <?php endif; ?></td>
              <td><?= $row['Name'] ?></td>
              <td><?= $row['Email'] ?></td>
              <td><?= $row['date_created'] ?></td>
              <td><?= $row['Phone_number'] ?></td>
              <td>
              <a href="http://127.0.0.1/PHP%20tasks/advanced%20database%20roles/viewUser.php?id=<?= $row['id'] ?>" class="btn btn-primary">View</a>
              <a href="http://127.0.0.1/PHP%20tasks/advanced%20database%20roles/update%20user.php?id=<?= $row['id'] ?>" class="btn btn-success">update</a>
              <a href="http://127.0.0.1/PHP%20tasks/advanced%20database%20roles/admin%20page.php?id=<?= $row['id'] ?>" class="btn btn-danger">delete</a>
              
                  
                </button>
              </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
