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
<!-- <!DOCTYPE html>
<html>

<body>
<h1>Add New Student</h1>
<?php displaySessionMessage(); ?>

<form method="POST" action="">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Phone: <input type="text" name="phone"><br><br>
    Course: <input type="text" name="course"><br><br>
    <button type="submit">Add Student</button>
    <a href="index.php" style="text-decoration:underline;">Back to Home</a>
</form>
</body>
</html>  -->


 <head>
    <title>Add Student</title>
    <link rel="stylesheet" href="./css/style.css">
</head> 


<form method="POST" action="" onsubmit="return validateForm();">
    <h1>Add New Student</h1>
    Name: <input type="text" name="name" id="name" required><br><br>
    Email: <input type="email" name="email" id="email" required><br><br>
    Phone: <input type="text" name="phone" id="phone" required pattern="[0-9]{10}"><br><br>
    Course: <input type="text" name="course" id="course" required><br><br>
    <button type="submit">Add Student</button>
    <a href="index.php" style="text-decoration:underline;">Back to Home</a>
</form>

<script>
function validateForm() {
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var course = document.getElementById("course").value.trim();

    if (name === "" || email === "" || phone === "" || course === "") {
        alert("All fields must be filled out.");
        return false;
    }
    
    if (!/^\d{10}$/.test(phone)) {
        alert("Phone number must be exactly 10 digits.");
        return false;
    }

    return true;
}
</script>
