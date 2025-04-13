<?php include "db.php"; ?>

<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-white text-black min-h-screen flex items-center justify-center px-4">

    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">Signup</h2>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium" for="username">Username</label>
                <input name="username" id="username" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black" required>
            </div>

            <div>
                <label class="block mb-1 font-medium" for="password">Password</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black" required>
            </div>

            <button name="register" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition">
                <i data-feather="user-plus" class="inline-block w-4 h-4 mr-2"></i> Signup
            </button>
        </form>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
