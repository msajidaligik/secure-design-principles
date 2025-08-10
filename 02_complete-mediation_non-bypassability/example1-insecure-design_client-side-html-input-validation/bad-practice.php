<?php
// If form submitted, grab input without validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';

    // Simulate processing input without validation/sanitization
    // Show input length and echo back raw input

    echo "<h2>Bad Practice Result</h2>";
    echo "<p>Input length: " . strlen($name) . "</p>";
    echo "<p>Hello, " . $name . "</p>";

    // Simulate a risk: if input is longer than 1000 chars, warn about potential issues
    if (strlen($name) > 100) {
        echo "<p style='color:red;'>Warning: Very long input detected! This can cause performance or memory issues.</p>";
    }

    echo "<p><a href='bad-practice.php'>Try again</a> | <a href='index.php'>Back to home</a></p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Bad Practice: Client-Side Validation Only</title>
</head>
<body>
    <h1>Bad Practice: Client-Side Validation Only</h1>
    <form method="post" action="bad-practice.php">
        <label for="name">Name (max 100 chars): </label>
        <!-- Client-side maxlength only -->
        <input id="name" name="name" type="text" maxlength="100" />
        <button type="submit">Submit</button>
    </form>
    <p><a href="index.php">Back to home</a></p>
</body>
</html>
