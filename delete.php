<?php
include 'config.php';
include 'session.php';

$id = $_GET['id'];

if (mysqli_query($conn, "DELETE FROM students WHERE id = $id")) {
    setSessionMessage('success', 'Student deleted successfully.');
} else {
    setSessionMessage('error', 'Error deleting student.');
}

header('Location: index.php');
?>
