<?php include "db.php"; session_start(); ?>

<?php
$error = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-white text-black min-h-screen flex items-center justify-center px-4">

    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        <?php if ($error): ?>
            <p class="text-red-600 text-sm mb-4 text-center"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium" for="username">Username</label>
                <input name="username" id="username" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            <div>
                <label class="block mb-1 font-medium" for="password">Password</label>
                <input type="password" name="password" id="password" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            <button name="login" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition">
                <i data-feather="log-in" class="inline-block w-4 h-4 mr-2"></i> Login
            </button>
        </form>

        <!-- Signup Link -->
        <p class="mt-4 text-sm text-center">
            Don't have an account?
            <a href="signup.php" class="text-black font-semibold hover:underline">Signup</a>
        </p>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
