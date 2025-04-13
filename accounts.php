<?php include "db.php"; session_start(); if (!isset($_SESSION['username'])) header("Location: login.php"); ?>

<?php
if (isset($_POST['add'])) {
    $account = $_POST['account'];
    $balance = $_POST['balance'];
    $conn->query("INSERT INTO accounts (account_name, balance) VALUES ('$account', $balance)");
}
?>

<h2>Accounts</h2>
<form method="POST">
    Account Name: <input name="account"><br>
    Balance: <input name="balance" type="number"><br>
    <button name="add">Add Account</button>
</form>

<h3>Account Balances</h3>
<?php
$result = $conn->query("SELECT * FROM accounts");
while ($row = $result->fetch_assoc()) {
    echo "{$row['account_name']} - ₹{$row['balance']}<br>";
}
?>
