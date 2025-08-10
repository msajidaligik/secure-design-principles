<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Least Privilege Demo – PHP in Docker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2em;
            max-width: 800px;
            margin: auto;
        }
        a {
            font-size: 1.2em;
            display: block;
            margin: 1em 0;
            text-decoration: none;
        }
        .good {
            color: green;
        }
        .bad {
            color: red;
        }
    </style>
</head>
<body>

<h1>Prevent Write Access to System Configuration Files – PHP Demo</h1>
<p>This demo showcases good vs. bad practices when writing files in a PHP application running inside a Docker container.</p>

<h2>Choose a Scenario:</h2>
<a class="bad" href="bad-practice.php">Bad Practice – Write to /etc (System Directory)</a>
<a class="good" href="good-practice.php">Good Practice – Write to App Directory</a>

<hr>
<p>Use <code>docker-compose down</code> and <code>docker-compose up -d</code> to reset your container if needed.</p>

</body>
</html>
