<?php
$target = '/etc/break-security.conf';

if (isset($_GET['exploit'])) {
    echo "<h3>Attempting to write to $target</h3>";

    $content = "This file was written by a PHP script running as www-data at " . date('c') . "\n";
    $result = @file_put_contents($target, $content);

    if ($result === false) {
        echo "<p style='color: red;'>Failed to write to <code>$target</code>. This is expected if /etc is protected.</p>";
    } else {
        echo "<p style='color: green;'>Successfully wrote to <code>$target</code>! Your container is now misconfigured and vulnerable.</p>";
    }

    echo "<hr><a href='bad-practice.php'>← Back</a>";
    exit;
}
?>

<h2> Prevent Write Access to System Configuration Files (Bad Practice)</h2>

<p>This demo shows what happens when the PHP app (running as <code>www-data</code>) is allowed to write to the <code>/etc</code> directory — which should <strong>never</strong> be writable by the application user.</p>

<h3>Manual Setup Instructions</h3>
<ol>
    <li>Open a terminal.</li>
    <li>Find the container name:
        <pre>docker ps</pre>
    </li>
    <li>Enter the container shell:
        <pre>docker exec -it prevent-user-or-app-to-write-system-files bash</pre>
    </li>
    <li>Make <code>/etc</code> writable (for demo only):
        <pre>chmod 777 /etc</pre>
    </li>
    <li>Return here and click the button below to execute the PHP exploit.</li>
</ol>

<p><a href="?exploit=1" style="font-size: 1.2em; color: red; font-weight: bold;">Exploit: Write to /etc from PHP</a></p>

<hr>

<h3>Important Cleanup Instructions</h3>
<p>Once you're done testing, you must stop and restart the container to reset permissions:</p>
<pre>
docker-compose down
docker-compose up -d
</pre>

<p>Do <strong>not</strong> use <code>chmod 777 /etc</code> in production or even in normal development environments.</p>
