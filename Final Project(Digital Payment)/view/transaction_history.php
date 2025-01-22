
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: publicledger.php');
    exit();
}

$transaction_id = $_GET['id'];

// Fetch transaction details
$sql = "SELECT t.*, u.username, w.balance 
        FROM transactions t 
        JOIN users u ON t.user_id = u.id 
        JOIN wallet w ON t.user_id = w.user_id 
        WHERE t.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $transaction_id);
$stmt->execute();
$result = $stmt->get_result();
$transaction = $result->fetch_assoc();

if (!$transaction) {
    header('Location: publicledger.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Details</title>
    <style>
        .transaction-details {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .back-button {
            margin: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <script src="../asset/transaction_history.js"></script>
</head>
<body>
    <button class="back-button" onclick="goBack()">Back to Ledger</button>
    <div class="transaction-details">
        <div class="detail-row">
            <span>Transaction ID:</span>
            <span><?php echo htmlspecialchars($transaction['id']); ?></span>
        </div>
        <div class="detail-row">
            <span>User:</span>
            <span><?php echo htmlspecialchars($transaction['username']); ?></span>
        </div>
        <div class="detail-row">
            <span>Amount:</span>
            <span><?php echo number_format($transaction['amount'], 2); ?></span>
        </div>
        <div class="detail-row">
            <span>Type:</span>
            <span><?php echo htmlspecialchars($transaction['type']); ?></span>
        </div>
        <div class="detail-row">
            <span>Timestamp:</span>
            <span><?php echo date('Y-m-d H:i:s', strtotime($transaction['timestamp'])); ?></span>
        </div>
        <div class="detail-row">
            <span>Balance After Transaction:</span>
            <span><?php echo number_format($transaction['balance'], 2); ?></span>
        </div>
    </div>
</body>
</html>