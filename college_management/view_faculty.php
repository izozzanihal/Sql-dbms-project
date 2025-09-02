<?php
session_start();
if(!isset($_SESSION['username'])) { 
    header("Location: index.php"); 
    exit(); 
}
include 'db.php';
$result = $conn->query("SELECT * FROM faculty ORDER BY faculty_id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Faculty</title>
    <link rel="stylesheet" href="vieww.css">
</head>
<body>
<div class="topbar">
    <h1>Faculty List</h1>
    <a href="logout.php" class="btn-logout">Logout</a>
</div>

<div class="container">
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>
    <div class="bg-box"></div>

    <div class="table-box">
        <h2>All Faculty</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if($result){ while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['faculty_id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['phone']); ?></td>
                    <td>
                        <a href="edit_faculty.php?id=<?= $row['faculty_id']; ?>" class="action-btn edit-btn">Edit</a>
                        <a href="delete_faculty.php?id=<?= $row['faculty_id']; ?>" 
                           class="action-btn delete-btn"
                           onclick="return confirm('Are you sure to delete this faculty?');">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
        <div class="links">
            <a href="dashboard.php">Back to Dashboard</a>
            <a href="add_faculty.php">Add Faculty</a>
        </div>
    </div>
</div>
</body>
</html>
