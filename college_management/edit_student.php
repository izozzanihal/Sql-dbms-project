<?php
session_start();
if(!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
    exit(); 
}
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE student_id='$id'");
$student = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE student_id='$id'";
    if($conn->query($sql)){
        header("Location: view_students.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="addd.css">
</head>
<body>
<div class="topbar">
    <h1>Edit Student</h1>
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
    <h2>Students Form Update</h2>
    <form method="post">
        <input type="text" name="name" value="<?= htmlspecialchars($student['name']); ?>" required>
        <input type="date" name="dob" value="<?= htmlspecialchars($student['dob']); ?>" required>
        <input type="email" name="email" value="<?= htmlspecialchars($student['email']); ?>" required>
        <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']); ?>" required>
        <button type="submit">Update Student</button>
        <div class="links">
            <a href="view_students.php">Back to Students</a>
        </div>
    </form>
    </div>
</div>
</body>
</html>
