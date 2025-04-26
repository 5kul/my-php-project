<?php
include 'config.php';
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>
<h1>Student Management System</h1>

<?php displaySessionMessage(); ?>

<a href="add.php">Add New Student</a>
<form method="GET" action="">
    <input type="text" name="search" placeholder="Search by name or course" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <button type="submit">Search</button>
</form>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>
<?php
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM students WHERE name LIKE '%$search%' OR course LIKE '%$search%'";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['course']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Edit</a> | 
                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure?')\">Delete</a>
            </td>
          </tr>";
}
?>
</table>
</body>
</html>
