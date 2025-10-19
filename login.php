<?php

session_start();


include 'config.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM admin_credentials WHERE USERNAME = ? AND PASSWORD = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        echo "Login successful!";
        
        header("Location: index.php");
        exit;
    } else {
        
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QUICKFIX PHARMACY LOGIN FORM</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="login-style.css">
</head>
<body>
    <div class="login-box">
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <div class="input-box">
                <ion-icon name="person-outline" class="icon"></ion-icon>
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-box">
                <ion-icon name="lock-closed-outline" class="icon"></ion-icon>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Login</button>
           
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
