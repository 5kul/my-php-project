<?php
include 'config.php';
include 'session.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);

if (!$student) {
    setSessionMessage('error', 'Student not found.');
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    if (empty($name) || empty($email) || empty($phone) || empty($course)) {
        setSessionMessage('error', 'All fields are required.');
    } else {
        $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            setSessionMessage('success', 'Student updated successfully.');
            header('Location: index.php');
            exit;
        } else {
            setSessionMessage('error', 'Error updating student.');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
<h1>Edit Student</h1>
<?php displaySessionMessage(); ?>

<form method="POST" action="">
    Name: <input type="text" name="name" value="<?= $student['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $student['email'] ?>"><br><br>
    Phone: <input type="text" name="phone" value="<?= $student['phone'] ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $student['course'] ?>"><br><br>
    <button type="submit">Update Student</button>
</form>
<a href="index.php">Back to Home</a>
</body>
</html>
