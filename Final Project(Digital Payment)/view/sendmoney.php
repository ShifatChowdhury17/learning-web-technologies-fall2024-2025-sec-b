<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $recipient_id = $_POST['recipient_id'];
    $user_id = $_SESSION['user_id'];

    // Database connection
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check sender's balance
    $sql = "SELECT balance FROM wallet WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($balance);
    $stmt->fetch();
    $stmt->close();

    if ($balance >= $amount) {
        // Deduct amount from sender's wallet
        $sql = "UPDATE wallet SET balance = balance - ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('di', $amount, $user_id);
        $stmt->execute();
        $stmt->close();

        // Add amount to recipient's wallet
        $sql = "UPDATE wallet SET balance = balance + ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('di', $amount, $recipient_id);
        $stmt->execute();
        $stmt->close();

        // Record transaction
        $sql = "INSERT INTO transaction (sender_id, recipient_id, amount) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iid', $user_id, $recipient_id, $amount);
        $stmt->execute();
        $stmt->close();

        echo "Money sent successfully!";
    } else {
        echo "Insufficient balance!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Money</title>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="sendmoneyvalidate.js"></script>
</head>
<body>
    <h1>Send Money</h1>
    <form method="post" action="sendmoney.php" onsubmit="return validateForm()">
        <label for="recipient_id">Recipient ID:</label>
        <input type="text" id="recipient_id" name="recipient_id" required>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Send Money</button>
    </form>
</body>
</html>