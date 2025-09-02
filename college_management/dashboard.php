<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboardd.css">
</head>
<body>
    <div class="animated-bg"></div>

    <div class="topbar">
        <h1>College Management System</h1>
        <div class="user-info">
            <span>👤 <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="dashboard">
        <h2>Welcome to Dashboard</h2>
        <div class="card-container">
            <a href="add_student.php" class="card">Add Students</a>
            <a href="add_faculty.php" class="card">Add Faculty</a>
            <a href="add_course.php" class="card">Add Courses</a>
            <a href="view_course.php" class="card">View Courses</a>
            <a href="view_students.php" class="card">View Students</a>
            <a href="view_faculty.php" class="card">View Faculty</a>
        </div>
    </div>
</body>
</html>
