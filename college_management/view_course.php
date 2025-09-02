<?php
session_start();
if(!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
    exit(); 
}
include 'db.php';
$result = $conn->query("SELECT * FROM courses ORDER BY course_id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Courses</title>
    <link rel="stylesheet" href="vieww.css">
</head>
<body>
<div class="topbar">
    <h1>Courses List</h1>
    <a href="logout.php" class="btn-logout">Logout</a>
</div>

<div class="container">
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>

    <div class="table-box">
        <h2>All Courses</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Credits</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if($result){ while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['course_id']; ?></td>
                    <td><?= htmlspecialchars($row['course_name']); ?></td>
                    <td><?= htmlspecialchars($row['credits']); ?></td>
                    <td>
                        <a href="edit_course.php?id=<?= $row['course_id']; ?>" class="action-btn edit-btn">Edit</a>
                        <a href="delete_course.php?id=<?= $row['course_id']; ?>" 
                           class="action-btn delete-btn"
                           onclick="return confirm('Are you sure to delete this course?');">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
        <div class="links">
            <a href="dashboard.php">Back to Dashboard</a>
            <a href="add_course.php">Add Course</a>
        </div>
    </div>
</div>
</body>
</html>
