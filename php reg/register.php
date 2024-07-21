<?php
include './connection_db.php';
$namerErr = $matchPasswordErr = $emailErr = "";

$regexName = '/^[A-Za-z]+ [A-Za-z]+$/';
$regexEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$regexPassword = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
    $flag = true;
    
    echo "<br>";
    
    // Validate name
    if (empty($name) || !preg_match($regexName, $name)) {
        $namerErr = "Name is required and must be two words with only alphabetic characters.";
        $flag = false;
    }
    // echo $flag ?"true":"flase";
    echo "<br>";

    // Validate email
    if (empty($email) || !preg_match($regexEmail, $email)) {
        $emailErr = "Valid email is required.";
        $flag = false;
    }
    // echo $flag ?"true":"flase";
    echo "<br>";

    // Validate password
    if (empty($password) || !preg_match($regexPassword, $password)) {
        $matchPasswordErr = "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
        $flag = false;
    }
    // echo $flag ?"true":"flase";
    echo "<br>";

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $matchPasswordErr = "Passwords do not match.";
        $flag = false;
    }
}
// echo $flag ?"true":"flase";
if ($flag) {
    

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $conn->exec($sql);
        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        session_write_close();
        print_r($_SESSION);

        header("Location: http://127.0.0.1/PHP%20tasks/php%20reg/register.php");
        exit; 
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
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
        <label for="exampleInputName1" class="form-label">Name</label>
        <input
            type="text"
            class="form-control"
            id="exampleInputName1" 
            name="name"
        />
        <span><?php echo $namerErr; ?></span> <!-- Corrected echo syntax -->
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            name="email"
        />
        <span><?php echo $emailErr; ?></span> <!-- Corrected echo syntax -->
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            name="password" 
        />
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
        <input
            type="password"
            class="form-control"
            id="exampleInputPassword2" 
            name="confirmPassword" 
        />
    </div>
    <span><?php echo $matchPasswordErr; ?></span> 
        <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
></script>
</body>
</html>
