<?php include "db.php"; session_start(); if (!isset($_SESSION['username'])) header("Location: login.php"); ?>

<?php
if (isset($_POST['add'])) {
    $customer = $_POST['customer'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['price'];
    $total = $quantity * $unit_price;

    $conn->query("INSERT INTO sales (customer_name, quantity, unit_price, total) 
                  VALUES ('$customer', $quantity, $unit_price, $total)");
}
?>

<h2>Sales</h2>
<form method="POST">
    Customer: <input name="customer"><br>
    Quantity: <input name="quantity" type="number"><br>
    Price: <input name="price" type="number"><br>
    <button name="add">Record Sale</button>
</form>

<h3>Sales History</h3>
<?php
$result = $conn->query("SELECT * FROM sales");
while ($row = $result->fetch_assoc()) {
    echo "{$row['customer_name']} bought {$row['quantity']} × ₹{$row['unit_price']} = ₹{$row['total']}<br>";
}
?>
