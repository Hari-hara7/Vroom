<?php include "db.php"; session_start(); if (!isset($_SESSION['username'])) header("Location: login.php"); ?>

<?php
if (isset($_POST['add'])) {
    $model = $_POST['model'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO automobiles (model, price) VALUES ('$model', $price)");
}
?>

<h2>Automobiles</h2>
<form method="POST">
    Model: <input name="model"><br>
    Price: <input name="price" type="number"><br>
    <button name="add">Add Vehicle</button>
</form>

<h3>Vehicle List</h3>
<?php
$result = $conn->query("SELECT * FROM automobiles");
while ($row = $result->fetch_assoc()) {
    echo "{$row['model']} - ₹{$row['price']}<br>";
}
?>
