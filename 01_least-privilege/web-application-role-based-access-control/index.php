<?php
session_start();
$user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>RBAC Demo</title>
</head>
<body>
    <h1> Web Application Role Based Access Control (RBAC) - Demo</h1>

    <?php if ($user): ?>
        <p>Logged in as <strong><?= htmlspecialchars($user['username']) ?></strong> (Role: <?= $user['role'] ?>)</p>
        <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
        <form method="POST" action="login.php">
            <label>Username: <input name="username" required></label><br>
            <label>Role:
                <select name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </label><br>
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>

    <h2 style="color:red">Bad Practice</h2>
    <ul>
        <li><a href="bad-practice/user-data.php">Bad: User Data</a></li>
        <li><a href="bad-practice/admin-data.php">Bad: Admin Data</a></li>
    </ul>

    <h2 style="color:green">Good Practice</h2>
    <ul>
        <li><a href="good-practice/user-data.php">Good: User Data</a></li>
        <li><a href="good-practice/admin-data.php">Good: Admin Data</a></li>
    </ul>
</body>
</html>
