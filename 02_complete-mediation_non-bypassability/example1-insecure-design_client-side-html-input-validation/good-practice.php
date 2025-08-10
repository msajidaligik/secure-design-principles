<?php
// If form submitted, validate & sanitize input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';

    // Server-side validation: max length 100
    if (strlen($name) > 100) {
        die("<p style='color:red;'>Error: Input too long. Max 100 characters allowed.</p><p><a href='good-practice.php'>Try again</a></p>");
    }

    // Sanitize output to prevent XSS
    $safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

    echo "<h2>Good Practice Result</h2>";
    echo "<p>Input length: " . strlen($safe_name) . "</p>";
    echo "<p>Hello, " . $safe_name . "</p>";
    echo "<p><a href='good-practice.php'>Try again</a> | <a href='index.php'>Back to home</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Good Practice: Server-Side Validation</title>
</head>
<body>
    <h1>Good Practice: Server-Side Validation</h1>
    <form method="post" action="good-practice.php">
        <label for="name">Name (max 100 chars): </label>
        <!-- Client-side maxlength plus server-side validation -->
        <input id="name" name="name" type="text" maxlength="100" />
        <button type="submit">Submit</button>
    </form>
    <p><a href="index.php">Back to home</a></p>
</body>
</html>
