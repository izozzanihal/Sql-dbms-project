<?php
session_start();
if(!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
    exit(); 
}
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM courses WHERE course_id='$id'");
$course = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['course_name'];
    $credits = $_POST['credits'];

    $sql = "UPDATE courses SET course_name='$name', credits='$credits' WHERE course_id='$id'";
    if($conn->query($sql)){
        header("Location: view_course.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="addd.css">
</head>
<body>
<div class="topbar">
    <h1>Edit Course</h1>
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
    <h2>Course Form Update</h2>
    <form method="post">
        <input type="text" name="course_name" value="<?= htmlspecialchars($course['course_name']); ?>" required>
        <input type="number" name="credits" value="<?= htmlspecialchars($course['credits']); ?>" required>
        <button type="submit">Update Course</button>
        <div class="links">
            <a href="view_courses.php">Back to Courses</a>
        </div>
    </form>
    </div>
</div>
</body>
</html>
