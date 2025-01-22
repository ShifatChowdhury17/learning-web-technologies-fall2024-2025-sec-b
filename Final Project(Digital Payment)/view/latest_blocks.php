<?php
session_start();
include '../controller/latest_blocksvalid.php';

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

$errors = [];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Mine Blocks</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/latest_blocks.js"></script>
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
    <h1>Mine Blocks</h1>
    <form name="mineBlockForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">
        Block Number: <input type="text" name="block_no"><br>
        Transaction: <input type="text" name="transaction"><br>
        User ID: <input type="text" name="user_id"><br>

        <input type="submit" value="Mine Block">
    </form>
</body>
</html>