<?php
$goodPath = '../secure-config/app.conf';

if (isset($_GET['write'])) {
    echo "<h3 Attempting to write to <code>$goodPath</code></h3>";

    $content = "This is a secure write by www-data at " . date('c') . "\n";
    $result = file_put_contents($goodPath, $content);

    if ($result === false) {
        echo "<p style='color: red;'>Failed to write to <code>$goodPath</code>. Check directory ownership and permissions.</p>";
    } else {
        echo "<p style='color: green;'>Successfully wrote to <code>$goodPath</code>. This follows the Principle of Least Privilege.</p>";
    }

    echo "<hr><a href='good-practice.php'>← Back</a>";
    exit;
}
?>

<h2>Prevent Write Access to System Configuration Files Demo (Good Practice)</h2>

<p>This page demonstrates writing to a dedicated application directory, owned by the app's user (e.g. <code>www-data</code>).</p>

<p>The target directory is: <code>/var/www/secure-config/</code><br>
It should be writable only by the application user, not by root or "everyone".</p>

<h3>Setup Instructions</h3>
<ol>
    <li>Ensure the directory exists:
        <pre>mkdir -p html/app/config</pre>
    </li>
    <li>Ensure correct ownership (from host or container):
        <pre>chown -R www-data:www-data /var/www/</pre>
    </li>
    <li>Click the button below to test writing a config file.</li>
</ol>

<p><a href="?write=1" style="font-size: 1.1em; color: green; font-weight: bold;">Write securely to app config</a></p>

<hr>

<p>Want to compare with the insecure example? Go to <a href="bad-practice.php">bad-practice.php</a></p>
