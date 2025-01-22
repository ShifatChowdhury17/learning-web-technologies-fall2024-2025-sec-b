<?php
session_start();
include 'db.php';
include '../controller/block_detailsvalid.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$blockId=intval($_GET['id']);;

$_SESSION['verified_block_id']=$blockId;
$block=blockDetail($blockId);
$_SESSION['block_id']=$blockId;

$errors = [];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Block Detail's</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    
    <script src="../asset/block_details.js">
    </script>
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
    <h1>Block Detail's</h1>
    <form name="blockDetail'sForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">
        Block Number: <input type="text" name="block_no" value="<?php echo $block['block_no']; ?>" disabled><br>
        Transaction: <input type="text" name="transaction" value="<?php echo $block['transaction']; ?>" disabled><br>
        User ID: <input type="text" name="user_idd" value="<?php echo $block['user_idd']; ?>" disabled><br>
        Date: <input type="text" name="date" value="<?php echo $block['created_at']; ?>" disabled><br>
        <input type="submit" value="Verify">
    </form>
</body>
</html>