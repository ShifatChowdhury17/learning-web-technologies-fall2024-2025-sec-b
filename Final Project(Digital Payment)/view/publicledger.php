<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch all transactions
$sql = "SELECT t.*, u.username 
        FROM transactions t 
        JOIN users u ON t.user_id = u.id 
        ORDER BY t.timestamp DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Public Ledger</title>
    <style>
        .transaction-row { 
            cursor: pointer; 
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        .transaction-row:hover {
            background-color: #f5f5f5;
        }
        .amount-positive { color: green; }
        .amount-negative { color: red; }
    </style>
    <script src="../asset/publicledger.js"></script>
</head>
<body>
    <h1>Public Ledger</h1>
    <div id="transactions-list">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="transaction-row" onclick="viewTransaction(<?php echo $row['id']; ?>)">
                <span class="timestamp"><?php echo date('Y-m-d H:i', strtotime($row['timestamp'])); ?></span>
                <span class="username"><?php echo htmlspecialchars($row['username']); ?></span>
                <span class="amount <?php echo $row['amount'] > 0 ? 'amount-positive' : 'amount-negative'; ?>">
                    <?php echo number_format($row['amount'], 2); ?>
                </span>
                <span class="type"><?php echo htmlspecialchars($row['type']); ?></span>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>