<?php 
include "./db_connection.php";
$flag = false;
$error='';
if($_SERVER["REQUEST_METHOD"] =="POST"){
    $email= isset($_POST['email'])? $_POST['email']:"" ;
    $password= isset($_POST['password'])? $_POST['password']:"" ;
    $flag = true;
    if(empty($email) ){
        $emailErr ="can not be empty ";
        $flag = false;
    }
    if(empty($password)){
        $passwordErr ="can not be empty";
        $flag = false;
    }
}
if($flag){
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Name, email, password,role_id FROM users WHERE email =:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $val){
        if($val['email'] == $email && $val['password'] == $password){
            
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["fullName"] = $val['Name'];
            $_SESSION["role"] = $val['role_id'];
            session_write_close();
            intval($val["role_id"]) == 2 ?header("Location: http://127.0.0.1/PHP%20tasks/advanced%20database%20roles/welcome.php") : header("Location: http://127.0.0.1/PHP%20tasks/advanced%20database%20roles/admin%20page.php/");; 
    }
    else 
    $error = "invaild";
    }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');

body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    background: #ffffff;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    width: 350px;
    text-align: center;
    transition: transform 0.3s ease-in-out;
}

.login-container:hover {
    transform: translateY(-10px);
}

.login-container h2 {
    margin-bottom: 1.5rem;
    color: #333;
    font-weight: 500;
}

.input-group {
    margin-bottom: 1.5rem;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #666;
    font-weight: 500;
}

.input-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease-in-out;
}

.input-group input:focus {
    border-color: #74ebd5;
    outline: none;
}

button {
    width: 100%;
    padding: 0.75rem;
    background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 500;
    transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
}

button:hover {
    background: linear-gradient(135deg, #ACB6E5 0%, #74ebd5 100%);
    transform: translateY(-3px);
}

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="email" id="username" name="email" >
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" >
            </div>
            <span><?php echo $error?></span>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
