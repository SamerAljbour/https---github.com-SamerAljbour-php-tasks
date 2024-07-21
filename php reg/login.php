<?php
include './connection_db.php';
// session_start();
// print_r($_SESSION);

$flag = false;
$emailErr = $passwordErr = "";
$email= $name = $password="";
$emailForm = $passwordForm = "";
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = isset($_POST['emailLogin'])?$_POST['emailLogin'] : "";
    $password = isset($_POST['passwordLogin'])?$_POST['passwordLogin'] : "";
    $flag = true;
    if(empty($email) ){
        $emailErr ="can not be empty ";
        $flag = false;
    }
    if(empty($password)){
        $passwordErr ="can not be empty";
        $flag = false;
    }
if($flag){
    
try {
    $emailForm = isset($_POST['emailLogin'])?$_POST['emailLogin'] : "";
    $passwordForm = isset($_POST['passwordLogin'])?$_POST['passwordLogin'] : "";
    $email = $emailForm;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT name ,email ,password from users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Check if password matches
        if ($result['password'] === $password) {
            $emailErr = "Login successful.";
        } else {
            $passwordErr = "Invalid password.";
        }
    } else {
        $emailErr = "Email not found.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <style>
        body {
            margin: 7%;
        }
        span{
            color:red;
        }
    </style>
</head>
<body>
<form method="POST" action="">
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            name="emailLogin"
        />
        <span><?php echo $emailErr; ?></span> <!-- Corrected echo syntax -->
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            name="passwordLogin" 
        />
    </div>
    <span><?php echo $passwordErr; ?></span> 
        
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
></script>
</body>
</html>
