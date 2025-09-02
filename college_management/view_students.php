<?php
session_start();
if(!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
    exit(); 
}
include 'db.php';
$result = $conn->query("SELECT * FROM students ORDER BY student_id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="vieww.css">
</head>
<body>
<div class="topbar">
    <h1>Students List</h1>
    <a href="logout.php" class="btn-logout">Logout</a>
</div>

<div class="container">
    <!-- Animated boxes -->
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>

    <div class="table-box">
        <h2>All Students</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Dob</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if($result){ while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['student_id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['dob']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['phone']); ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $row['student_id']; ?>" class="action-btn edit-btn">Edit</a>
                        <a href="delete_student.php?id=<?= $row['student_id']; ?>" 
                           class="action-btn delete-btn"
                           onclick="return confirm('Are you sure to delete this student?');">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
        <div class="links">
            <a href="dashboard.php">Back to Dashboard</a>
            <a href="add_student.php">Add Student</a>
        </div>
    </div>
</div>
</body>
</html>
