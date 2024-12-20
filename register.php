<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "arts_user_auth");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorMessage = ""; // Initialize error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $confirmpassword = $_POST['confirmpassword'];

    // Securely hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username already exists
    $checkUsername = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $checkUsername);

    if (mysqli_num_rows($result) > 0) {
        $errorMessage = "Username already exists!"; // Set error message
    } else {
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Signup successful!'); window.location.href = 'login.php';</script>";
            exit();
        } else {
            $errorMessage = "Error: " . mysqli_error($conn); // Set error message for database error
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .container h1 {
            font-size: 22px;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            transition: all 0.3s;
        }

        form input[type="text"]:focus,
        form input[type="email"]:focus,
        form input[type="password"]:focus {
            border-color: #00d4ff;
            box-shadow: 0 0 8px rgba(0, 212, 255, 0.5);
        }

        .button {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: rgba(0, 212, 255, 0.8);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button:hover {
            background-color: rgba(0, 180, 220, 1);
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 212, 255, 0.5);
        }

        .login-link {
            font-size: 12px;
            color: #e0e0e0;
            margin-top: 10px;
        }

        .login-link a {
            color: #00d4ff;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: #ffffff;
        }
    </style>

    <script>
        // JavaScript validation function
        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmpassword').value;
            var errorMessage = "";

            // Check if password length is at least 8 characters
            if (password.length < 8) {
                errorMessage = "Password must be at least 8 characters long.";
            }
            // Check if password contains spaces
            else if (/\s/.test(password)) {
                errorMessage = "Password must not contain spaces.";
            }
            // Check if password and confirm password match
            else if (password !== confirmPassword) {
                errorMessage = "Passwords do not match!";
            }

            // If any error, show message and prevent form submission
            if (errorMessage) {
                document.getElementById('error-message').innerText = errorMessage;
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Register Here</h1>

        <!-- Display error message -->
        <div id="error-message" class="error-message">
            <?php if (!empty($errorMessage)): ?>
                <?php echo $errorMessage; ?>
            <?php endif; ?>
        </div>

        <form method="POST" action="register.php" onsubmit="return validateForm()">
            <input type="text" placeholder="User name" required name="username">
            <input type="email" placeholder="Email" required name="email">
            <input type="password" id="password" placeholder="Password" name="pwd" required>
            <input type="password" id="confirmpassword" placeholder="Confirm Password" required name="confirmpassword">
            <button type="submit" class="button">Register</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
</body>
</html>
