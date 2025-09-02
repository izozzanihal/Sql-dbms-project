<?php
session_start();
if(!isset($_SESSION['username'])) { header("Location: index.php"); exit(); }
include 'db.php';
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $credits = $_POST['credits'];
    $sql = "INSERT INTO courses (course_name, credits) VALUES ('$course_name', '$credits')";
    if ($conn->query($sql)) { $msg = "✅ Course Added!"; } else { $msg = "❌ Error: " . $conn->error; }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Course</title>
  <link rel="stylesheet" href="addd.css">
</head>
<body>
<div class="topbar">
  <h1>Add Course</h1>
  <a href="logout.php" class="btn-logout">Logout</a>
</div>

<div class="container">
  <div class="bg-box"></div><div class="bg-box"></div><div class="bg-box"></div><div class="bg-box"></div><div class="bg-box"></div>

  <div class="form-box">
    <h2>Course Form</h2>
    <form method="post">
      <input type="text" name="course_name" placeholder="Course Name" required>
      <input type="number" name="credits" placeholder="Credits" required>
      <button type="submit">Save</button>
    </form>
    <p><?php echo $msg; ?></p>
    <div class="links">
      <a href="view_course.php">View Courses</a>
      <a href="dashboard.php">Back to Dashboard</a>
    </div>
  </div>
</div>
</body>
</html>
