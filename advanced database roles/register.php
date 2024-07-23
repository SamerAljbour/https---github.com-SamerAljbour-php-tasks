<?php 
include "./db_connection.php";
?>
<?php 

// regex
$fullNameRegx ='/^[a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+$/';
$passwordRegx ='/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
$mobileRegx ='/^\d{10}$/';
$emailRegx = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$flag = false;
$fullNameErr = $emailErr = $moblieErr = $passwordErr = $confirmPasswordErr = $profilePicErr ="";


// error  vars
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // checking the value of each one to avoid warnings
    $fullName = isset($_POST['full-name'])? $_POST['full-name'] : '';
    $email = isset($_POST['email'])? $_POST['email'] : '';
    $mobile = isset($_POST['mobile'])? $_POST['mobile'] : '';
    $password = isset($_POST['password'])? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirm-password'])? $_POST['confirm-password'] : '';
    $profilePic = isset($_FILES['profile-picture'])? $_FILES['profile-picture'] : '';
    $flag = true;
    // validation
    if (empty($fullName) || !preg_match($fullNameRegx, $fullName)) {
        // $fullNameErr = "Name is required and must be 4 words with only alphabetic characters.";
        $flag = false;
    }
    if (empty($email) || !preg_match($emailRegx, $email)) {
        // $emailErr = "should be a vaild email like : example@example.com";
        $flag = false;
    }
    if (empty($mobile) || !preg_match($mobileRegx, $mobile)) {
        // $moblieErr = "should be a 10 digits like : 07XXXXXX";
        $flag = false;
    }
    if (empty($password) || !preg_match($passwordRegx, $password)) {
        // $passwordErr = "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
        $flag = false;
    }
    if($password !== $confirmPassword){
        // $confirmPasswordErr="password not matched";
        $flag = false;
    }

    if (isset($profilePic)) {
        if (count($_FILES) > 0) {
            
                $imgData = file_get_contents($_FILES['profile-picture']['tmp_name']);
                $imgType = $_FILES['profile-picture']['type'];
;
    }else
    $flag = false;
    
    
    
}}


if($flag){
    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (imageData, imageType, Name, Email, password, date_created, Phone_number, role_id) 
                    VALUES (:imageData, :imageType, :fullName, :email, :password, CURDATE(), :mobile, 2)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":imageData", $imgData, PDO::PARAM_LOB);
        $stmt->bindParam(":imageType", $imgType);
        $stmt->bindparam(":fullName" , $fullName);
        $stmt->bindparam(":email" , $email);
        $stmt->bindparam(":password" , $password);
        $stmt->bindparam(":mobile" , $mobile);
        $stmt -> execute();
        session_start();
        // $_SESSION['$ilename'] = $filename;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 2;
        session_write_close();

        
        header("Location: http://127.0.0.1/PHP%20tasks/advanced%20database%20roles/welcome.php");
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');
    span{
        color :red;
        font-size:15px ;
    }
body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.signup-container {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    width: 320px; /* Reduced width */
    max-width: 100%;
    padding: 1.5rem; /* Reduced padding */
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    max-height: 100vh;
}

.signup-container h2 {
    margin-bottom: 1rem; /* Reduced margin */
    color: #333;
    font-weight: 500;
}

.input-group {
    margin-bottom: 1rem; /* Reduced margin */
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 0.3rem; /* Reduced margin */
    color: #666;
    font-weight: 500;
}

.input-group input {
    width: 100%;
    padding: 0.5rem; /* Reduced padding */
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease-in-out;
}

.input-group input:focus {
    border-color: #74ebd5;
    outline: none;
}

.image-preview {
    margin-bottom: 1rem; /* Reduced margin */
    text-align: center;
}

.image-preview img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    display: none; /* Initially hide the preview */
}

button {
    width: 100%;
    padding: 0.5rem; /* Reduced padding */
    background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9rem; /* Reduced font size */
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
    <div class="signup-container">
        <div class="form-container">
            <h2>Sign Up</h2>
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" >
                <div class="input-group">
                    <label for="full-name">Full Name</label>
                    <input type="text" id="full-name" name="full-name" >
                </div>
                <span id="fullNameErr"><?php echo $fullNameErr ?></span>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <span id="emailErr"><?php echo $emailErr ?></span>
                <div class="input-group">
                    <label for="mobile">Mobile</label>
                    <input type="tel" id="mobile" name="mobile" >
                </div>
                <span id="mobileErr"><?php echo $moblieErr ?></span>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" >
                    <span id = "passwordErr"><?php echo $passwordErr ?></span>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" >
                    <span id="confirmPasswordErr"><?php echo $confirmPasswordErr ?></span>
                </div>
                <div class="input-group">
                    <label for="profile-picture">Profile Picture</label>
                    <input type="file" id="profile-picture" name="profile-picture" accept="image/*">
                </div>
                <span id="profilePicErr"><?php echo $profilePicErr ?></span>
                <div class="image-preview">
                    <img id="image-preview" src="" alt="Image Preview" />
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            let valid = true;

            // Clear previous error messages
            document.getElementById("fullNameErr").innerHTML = "";
            document.getElementById("emailErr").innerHTML = "";
            document.getElementById("mobileErr").innerHTML = "";
            document.getElementById("passwordErr").innerHTML = "";
            document.getElementById("confirmPasswordErr").innerHTML = "";
            document.getElementById("profilePicErr").innerHTML = "";

            // Validate full name
            let fullName = document.getElementById("full-name").value.trim();
            let fullNamePattern = /^[a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+ [a-zA-Z]+$/;
            if (fullName === "" || !fullNamePattern.test(fullName)) {
                document.getElementById("fullNameErr").innerHTML = "Name is required and must be 4 words with only alphabetic characters.";
                valid = false;
            }

            // Validate email
            let email = document.getElementById("email").value.trim();
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (email === "" || !emailPattern.test(email)) {
                document.getElementById("emailErr").innerHTML = "1Should be a valid email like: example@example.com";
                valid = false;
            }

            // Validate mobile
            let mobile = document.getElementById("mobile").value.trim();
            let mobilePattern = /^\d{10}$/;
            if (mobile === "" || !mobilePattern.test(mobile)) {
                document.getElementById("mobileErr").innerHTML = "Should be a 10 digits like: 07XXXXXX";
                valid = false;
            }

            // Validate password
            let password = document.getElementById("password").value.trim();
            let passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (password === "" || !passwordPattern.test(password)) {
                document.getElementById("passwordErr").innerHTML = "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
                valid = false;
            }

            // Validate confirm password
            let confirmPassword = document.getElementById("confirm-password").value.trim();
            if (password !== confirmPassword) {
                document.getElementById("confirmPasswordErr").innerHTML = "Passwords do not match";
                valid = false;
            }

            // Validate profile picture
            let profilePic = document.getElementById("profile-picture").files[0];
            if (!profilePic) {
                document.getElementById("profilePicErr").innerHTML = "Profile picture is required";
                valid = false;
            }

            return valid;
        }
    </script>
</body>
</html>
