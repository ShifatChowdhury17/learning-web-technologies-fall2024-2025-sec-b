<?php
session_start();
include 'db.php';

include '../controller/mine_blocksvalid.php';

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}
$blocks=getBlockList();
$errors = [];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Mine Blocks</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .center {
            text-align: center;
        }

        .button {
            padding: 8px 12px;
            margin: 0 5px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .verify-btn {
            background-color: #28a745;
            color: white;
        }

        .verify-btn:hover {
            background-color: #218838;
        }

        .see-more-btn {
            background-color: #007bff;
            color: white;
        }

        .see-more-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="../asset/mine_blocks.js"></script>
</head>
<body>
    <h1>Dashboard</h1>
    <form name="dashboardForm" method="post" action="dashboard_handler.php" onsubmit="return validateForm()">
        <ul>
  
            <li><a href="view_profile.php"><b>View Profile</b></a></li>
            <li><a href="edit_profile.php"><b>Edit Profile</b></a></li>
            <li><a href="latest_blocks.php"><b>Latest Block Insert</b></a></li>
            <li><a href="mine_blocks.php"><b>Mine Block List</b></a></li>
            <li><a href="verify_blocks.php"><b>Verify Block List</b></a></li>
            <li><a href="change_password.php"><b>Change Password</b></a></li>
            <li><a href="logout.php"><b>Log Out</b></a></li>
        </ul>
    </form>
</body>
<body>
    <h1>Block List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Block Number</th>
                <th>Transaction</th>
                <th>User ID</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($blocks)): ?>
                <?php foreach ($blocks as $block): ?>
                    <tr>
                        <td class="center"><?php echo $block['id']; ?></td>
                        <td class="center"><?php echo $block['block_no']; ?></td>
                        <td><?php echo htmlspecialchars($block['transaction']); ?></td>
                        <td class="center"><?php echo $block['user_idd']; ?></td>
                        <td><?php echo $block['created_at']; ?></td>
                        <td class="center">
                            <!-- Verify Button -->
                            <button 
                                class="button verify-btn" 
                                onclick="verifyBlock(<?php echo $block['id']; ?>)">
                                Verify
                            </button>
                            
                            <!-- See More Button -->
                            <button 
                                class="button see-more-btn" 
                                onclick="window.location.href='block_details.php?id=<?php echo $block['id']; ?>'">
                                See More
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="center">No blocks found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        // Function to handle block verification
        function verifyBlock(blockId) {
            if (confirm("Are you sure you want to verify this block?")) {
            
                fetch('verify_block.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `id=${blockId}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload(); // Reload page to reflect changes
                })
                .catch(error => console.error('Error verifying block:', error));
            }
        }
    </script>
</body>
</html>