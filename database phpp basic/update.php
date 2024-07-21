<?php
include './db_connection.php';
$id = $_GET['id'];
$sql = "SELECT * FROM employee_details WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);


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
    <form method="POST" action="view_employee.php?id=<?= $data['id'] ?>&name=<?= $data['name'] ?>&address=<?= $data['address']?>&salary=<?= $data['salary']?>">
      <div class="mb-3">
        <label for="exampleInputFirstName1" class="form-label">Name</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputFirstName1"
          name="name"
          value="<?= htmlspecialchars($data['name'])?>"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">address</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          name="address"
          value="<?= htmlspecialchars($data['address'])?>"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">salary</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          name="salary"
          value="<?= ($data['salary'])?>"
        />
      </div>
      
      <button type="submit" class="btn btn-primary">update
      <a href="view_employee.php?id=<?= $data['name'] ?>&id=<?= $data['address']?>&id=<?= $data['salary']?>"></a>
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

