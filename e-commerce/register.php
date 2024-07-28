<?php 
require "./db_connection.php";
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, "api.example.com");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// // $output = curl_exec($curl);
// curl_close($curl);

$fullNameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
$fullNameRegx = '/^[a-zA-Z]+ [a-zA-Z]+$/';
$passwordRegx = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
$emailRegx = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "";

    $flag = true;

    if (empty($name) || !preg_match($fullNameRegx, $name)) {
        $fullNameErr = "Name is required and must be exactly two words with only alphabetic characters.";
        $flag = false;
    }

    if (empty($email) || !preg_match($emailRegx, $email)) {
        $emailErr = "Email should be valid, e.g., example@example.com";
        $flag = false;
    }

    if (empty($password) || !preg_match($passwordRegx, $password)) {
        $passwordErr = "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
        $flag = false;
    }

    if ($password !== $confirmPassword) {
        $confirmPasswordErr = "Passwords do not match.";
        $flag = false;
    }

}
if ($flag) {
    try{
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn ->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $result -> bindParam(':email',$email);
        $result -> bindParam(':password',$password);
    }
 catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
    echo "Form validation passed!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        margin: 10%;
      }
    </style>
</head>
<body>
<form action="./createUser.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" name="name" required>
    <div><?php echo $fullNameErr ?></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
    <div><?php echo $emailErr ?></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
    <div><?php echo $passwordErr ?></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputConfirmPassword1" name="confirmPassword" required>
    <div><?php echo $confirmPasswordErr ?></div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
