<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login'); // Jika belum login, redirect ke halaman login
    exit();
}

// Ambil data pengguna dari sesi
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Dartoyo Coffee</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($user['username']); ?></p>
    <p>Role: <?php echo htmlspecialchars($user['role']); ?></p>
    
    <!-- Menampilkan foto profil jika ada -->
    <?php if ($user['profile_photo']): ?>
        <img src="/path/to/photos/<?php echo htmlspecialchars($user['profile_photo']); ?>" alt="Profile Photo">
    <?php endif; ?>
    
    <a href="/logout">Logout</a>
</body>
</html>