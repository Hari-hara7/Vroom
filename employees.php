<?php include "db.php"; session_start(); if (!isset($_SESSION['username'])) header("Location: login.php"); ?>

<?php
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $conn->query("INSERT INTO employees (name, role) VALUES ('$name', '$role')");
}
?>

<h2>Employees</h2>
<form method="POST">
    Name: <input name="name"><br>
    Role: <input name="role"><br>
    <button name="add">Add Employee</button>
</form>

<h3>List of Employees</h3>
<?php
$result = $conn->query("SELECT * FROM employees");
while ($row = $result->fetch_assoc()) {
    echo "{$row['name']} - {$row['role']}<br>";
}
?>
