<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // secure conversion to integer

    $sql = "DELETE FROM courses WHERE course_id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Course deleted successfully'); window.location='view_course.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
