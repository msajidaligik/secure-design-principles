<!DOCTYPE html>
<html>
<head>
    <title>Bank Demo</title>
</head>
<body>
    <h1>Welcome to Secure Bank</h1>

    <h2>Check Balance</h2>
    <form action="balance.php" method="get">
        <label>Account Name: <input type="text" name="name" required></label>
        <button type="submit">Check</button>
    </form>

    <h2>Transfer Money</h2>
    <form action="transfer.php" method="post" onsubmit="return validateForm()">
        <label>From: <input type="text" name="from" required></label>
        <label>To: <input type="text" name="to" required></label>
        <label>Amount: <input type="number" step="0.01" name="amount" min="0.01" required></label>
        <button type="submit">Transfer</button>
    </form>

    <script>
        function validateForm() {
            const amount = parseFloat(document.querySelector('[name="amount"]').value);
            if (amount <= 0) {
                alert("Amount must be greater than 0");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

