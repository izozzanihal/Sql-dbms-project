<?php
session_start();
if(!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
    exit(); 
}
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM faculty WHERE faculty_id='$id'");
$faculty = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE faculty SET name='$name', email='$email', phone='$phone' WHERE faculty_id='$id'";
    if($conn->query($sql)){
        header("Location: view_faculty.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty</title>
    <link rel="stylesheet" href="addd.css">
</head>
<body>
<div class="topbar">
    <h1>Edit Faculty</h1>
    <a href="logout.php" class="btn-logout">Logout</a>
</div>

<div class="container">
      <!-- Animated boxes -->
        <div class="bg-box"></div>
        <div class="bg-box"></div>
        <div class="bg-box"></div>
        <div class="bg-box"></div>
        <div class="bg-box"></div>
        <div class="bg-box"></div>
       
    <div class="form-box">
    <h2>Faculty Form Update</h2>
    <form method="post">
        <input type="text" name="name" value="<?= htmlspecialchars($faculty['name']); ?>" required>
        <input type="email" name="email" value="<?= htmlspecialchars($faculty['email']); ?>" required>
        <input type="text" name="phone" value="<?= htmlspecialchars($faculty['phone']); ?>" required>
        <button type="submit">Update Faculty</button>
        <div class="links">
            <a href="view_faculty.php">Back to Faculty</a>
        </div>
    </form>
    </div>
</div>
</body>
</html>
