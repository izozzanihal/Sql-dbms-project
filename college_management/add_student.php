<?php
session_start();
if(!isset($_SESSION['username'])) { header("Location: index.php"); exit(); }
include 'db.php';
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO students (name, dob, email, phone) VALUES ('$name', '$dob', '$email', '$phone')";
    if ($conn->query($sql)) { $msg = "✅ Student Added!"; } else { $msg = "❌ Error: " . $conn->error; }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Student</title>
  <link rel="stylesheet" href="addd.css">
</head>
<body>
<div class="topbar">
  <h1>Add Student</h1>
  <a href="logout.php" class="btn-logout">Logout</a>
</div>

<div class="container">
  <!-- Animated boxes -->
  <div class="bg-box"></div>
  <div class="bg-box"></div>
  <div class="bg-box"></div>
  <div class="bg-box"></div>
  <div class="bg-box"></div>

  <div class="form-box">
    <h2>Student Form</h2>
    <form method="post">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="date" name="dob" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="phone" placeholder="Phone" required>
      <button type="submit">Save</button>
    </form>
    <p><?php echo $msg; ?></p>
    <div class="links">
      <a href="view_students.php">View Students</a>
      <a href="dashboard.php">Back to Dashboard</a>
    </div>
  </div>
</div>
</body>
</html>
