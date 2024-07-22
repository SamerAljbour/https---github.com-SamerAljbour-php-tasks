<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Landing Page Styles */

body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.landing-container {
    text-align: center;
    color: #fff;
}

.welcome-message {
    background: #EEE;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    max-width: 400px;
    width: 100%;
}

.welcome-message h1 {
    color:black;
    margin-bottom: 1rem;
    font-size: 2rem;
    font-weight: 500;
}

.welcome-message p {
    color:black;
    margin-bottom: 2rem;
    font-size: 1rem;
}

.links .btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    margin: 0.5rem;
    background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1rem;
    font-weight: 500;
    transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.links .btn:hover {
    background: linear-gradient(135deg, #ACB6E5 0%, #74ebd5 100%);
    transform: translateY(-3px);
}

    </style>
</head>
<body>
    <div class="landing-container">
        <div class="welcome-message">
            <h1>Welcome to Our Website!</h1>
            <p>Join us to explore amazing features and stay connected.</p>
            <div class="links">
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Sign Up</a>
            </div>
        </div>
    </div>
</body>
</html>
