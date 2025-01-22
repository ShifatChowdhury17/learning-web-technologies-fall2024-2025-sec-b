<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $user_id = $_SESSION['user_id'];

    
    $sql = "INSERT INTO transactions (user_id, amount, type) VALUES (?, ?, 'deposit')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('id', $user_id, $amount);
    $stmt->execute();

    $sql = "UPDATE wallet SET balance = balance + ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('di', $amount, $user_id);
    $stmt->execute();

   /* // Update wallet balance
    $sql = "UPDATE wallet SET balance = balance + ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('di', $amount, $user_id);
    if ($stmt->execute()) {
        echo "Money added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();*/
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Money</title>
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

        input[type="number"] {
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
    <script src="addmoneyvalidate.js"></script>
</head>
<body>
    <h1>Add Money to Wallet</h1>
    <form method="post" action="addmoney.php" onsubmit="return validateForm()">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Add Money</button>
    </form>
</body>
</html>