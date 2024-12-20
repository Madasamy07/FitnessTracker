<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "arts_user_auth");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = ""; // Initialize the error variable

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    // Fetch user from the database
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $user['username'];

            // Redirect to the home page
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Body Styling */
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
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
            text-align: center;
        }

        .container h1 {
            font-size: 28px;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .txt_field {
            margin-bottom: 20px;
        }

        .txt_field input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        .button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: white;
            background: #2691d9;
            border: none;
            border-radius: 10px;
        }

        .login_link {
            margin-top: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .login_link a {
            color: #00d4ff;
        }

        .error_message {
            color: #ff4d4d;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome Back!</h1>

        <!-- Display Error Message -->
        <?php if (!empty($error)): ?>
            <div class="error_message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="Login.php">
            <div class="txt_field">
                <input type="text" placeholder="User name" name="username" required value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
            </div>
            <div class="txt_field">
                <input type="password" placeholder="Password" name="pwd" required>
            </div>
            <button type="submit" class="button">Login</button>
            <div class="login_link">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </form>
    </div>
</body>
</html>
