<?php 
session_start(); 
if (!isset($_SESSION['username'])) header("Location: login.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-black text-white min-h-screen flex flex-col items-center justify-center px-4">

    <div class="bg-white text-black p-6 rounded-2xl shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-4 text-center">Welcome, <?php echo $_SESSION['username']; ?></h2>

        <ul class="space-y-4 text-lg">
            <li class="flex items-center gap-2 hover:text-gray-600 transition">
                <i data-feather="users"></i>
                <a href="employees.php">Manage Employees</a>
            </li>
            <li class="flex items-center gap-2 hover:text-gray-600 transition">
                <i data-feather="truck"></i>
                <a href="automobiles.php">Manage Automobiles</a>
            </li>
            <li class="flex items-center gap-2 hover:text-gray-600 transition">
                <i data-feather="shopping-cart"></i>
                <a href="sales.php">Manage Sales</a>
            </li>
            <li class="flex items-center gap-2 hover:text-gray-600 transition">
                <i data-feather="dollar-sign"></i>
                <a href="accounts.php">Manage Accounts</a>
            </li>
            <li class="flex items-center gap-2 text-red-600 hover:text-red-400 transition">
                <i data-feather="log-out"></i>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
