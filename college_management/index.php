<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $_SESSION['username'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <h2>College Management System</h2>

    <!-- Animated boxes -->
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
