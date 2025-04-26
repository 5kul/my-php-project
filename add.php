<?php
include 'config.php';
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    if (empty($name) || empty($email) || empty($phone) || empty($course)) {
        setSessionMessage('error', 'All fields are required.');
    } else {
        $query = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
        if (mysqli_query($conn, $query)) {
            setSessionMessage('success', 'Student added successfully.');
            header('Location: index.php');
            exit;
        } else {
            setSessionMessage('error', 'Error adding student.');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
<h1>Add New Student</h1>
<?php displaySessionMessage(); ?>

<form method="POST" action="">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Phone: <input type="text" name="phone"><br><br>
    Course: <input type="text" name="course"><br><br>
    <button type="submit">Add Student</button>
</form>
<a href="index.php">Back to Home</a>
</body>
</html>
