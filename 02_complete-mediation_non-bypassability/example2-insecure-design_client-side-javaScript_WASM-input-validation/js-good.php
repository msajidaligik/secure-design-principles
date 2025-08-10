<!DOCTYPE html>
<html>
<head><title>Good Practice</title></head>
<body>
    <h2>Send Payment (Validated on Server)</h2>
    <form onsubmit="sendPayment(event)">
        <label>Amount (Max: Rs 1000):</label>
        <input type="number" id="amount" name="amount" max="1000" />
        <button type="submit">Send</button>
    </form>
    <pre id="response"></pre>

    <script>
        function sendPayment(event) {
            event.preventDefault();
            let amount = parseInt(document.getElementById("amount").value);
            if (amount > 1000) {
                alert("Max amount is Rs1000");
                return;
            }

            fetch("api/good.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "amount=" + amount
            })
            .then(res => res.text())
            .then(data => document.getElementById("response").textContent = data);
        }
    </script>

</body>
</html>
