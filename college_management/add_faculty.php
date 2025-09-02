<?php
session_start();
if(!isset($_SESSION['username'])) { header("Location: index.php"); exit(); }
include 'db.php';
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO faculty (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql)) { $msg = "✅ Faculty Added!"; } else { $msg = "❌ Error: " . $conn->error; }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Faculty</title>
  <link rel="stylesheet" href="addd.css">
</head>
<body>
<div class="topbar">
  <h1>Add Faculty</h1>
  <a href="logout.php" class="btn-logout">Logout</a>
</div>

<div class="container">
  <div class="bg-box"></div><div class="bg-box"></div><div class="bg-box"></div><div class="bg-box"></div><div class="bg-box"></div>

  <div class="form-box">
    <h2>Faculty Form</h2>
    <form method="post">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="number" name="phone" placeholder="Phone" required>
      <button type="submit">Save</button>
    </form>
    <p><?php echo $msg; ?></p>
    <div class="links">
      <a href="view_faculty.php">View Faculty</a>
      <a href="dashboard.php">Back to Dashboard</a>
    </div>
  </div>
</div>
</body>
</html>
