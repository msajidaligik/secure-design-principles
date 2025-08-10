<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Least Privilege API Demo</title></head>
<body>
<h1>Least Privilege – Restrict Write Permissions in APIs Demo</h1>

<?php if (!isset($_SESSION['user_id'])): ?>
  <p><strong>You are not logged in.</strong></p>
  <form action="/login.php" method="post">
    <button name="user_id" value="1">Login as Alice (user 1)</button>
    <button name="user_id" value="2">Login as Bob (user 2)</button>
  </form>
<?php else: ?>
  <p>Logged in as User ID: <?= $_SESSION['user_id'] ?></p>
  <form action="/logout.php" method="post">
    <button type="submit">Logout</button>
  </form>
<?php endif; ?>

<hr>

<h2>Good Practice: Session-based Email Update (POST)</h2>
<?php if (isset($_SESSION['user_id'])): ?>
  <form action="/api/good-update.php" method="post">
    <label>New Email:
      <input name="email" type="email" required>
    </label>
    <button type="submit">Update My Email</button>
  </form>
<?php else: ?>
  <p><em>Login first to access secure update.</em></p>
<?php endif; ?>

<hr>

<h2>Bad Practice: Open Email Update (GET + No Auth)</h2>
<form action="/api/bad-update.php" method="get">
  <label>User ID:
    <input name="user_id" type="number" value="1" required>
  </label><br>
  <label>New Email:
    <input name="email" type="email" required>
  </label><br>
  <button type="submit">Update Email (Insecure)</button>
</form>

</body>
</html>
