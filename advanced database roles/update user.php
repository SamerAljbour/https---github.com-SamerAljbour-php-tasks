<?php
//add sesstion to every page
//js validation
include './db_connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$data = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['nameUP']))
$data['name'] = $_POST['nameUP'];
else
$_POST['nameUP']="";
if(isset($_POST['EmailUP']))
$data['Email'] = $_POST['EmailUP'];
else
$_POST['EmailUP']="";
if(isset($_POST['Phone_numberUP']))
$data['Phone_number'] = $_POST['Phone_numberUP'];
else
$_POST['Phone_numberUP']="";
if(isset($_POST['passwordUP']))
$data['password'] = $_POST['passwordUP'];
else
$_POST['passwordUP']="";

$sql = "UPDATE users SET Name = :Name, Email = :Email, Phone_number = :Phone_number,password = :password WHERE id = :id";

$stmt = $conn->prepare($sql);


// Bind the parameters
$stmt->bindParam(':Name', $_POST['nameUP']);
$stmt->bindParam(':Email', $_POST['EmailUP']);
$stmt->bindParam(':Phone_number', $_POST['Phone_numberUP']);
$stmt->bindParam(':password', $_POST['passwordUP']);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Execute the statement
$stmt->execute();
header("Location: http://127.0.0.1/PHP%20tasks/advanced%20database%20roles/admin%20page.php"); 
}

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
          value="<?= htmlspecialchars($data['Name'])?>"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          name="EmailUP"
          value="<?= htmlspecialchars($data['Email'])?>"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Phone number</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          name="Phone_numberUP"
          value="<?= ($data['Phone_number'])?>"
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">password</label>
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          name="passwordUP"
          value="<?= ($data['password'])?>"
        />
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      
      
     
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

