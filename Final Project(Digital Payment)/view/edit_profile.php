<?php
session_start();
include 'db.php';
include '../controller/edit_profilevalid.php';


if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

$user_id = $_SESSION['user_id'];
$user = getUser($user_id);

$errors = [];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/edit_profile.js"></script>
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
    <h1>Edit Profile</h1>
    <form name="profileForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()">
        Full Name: <input type="text" name="full_name" value="<?php echo isset($user['full_name']) ? $user['full_name'] : ''; ?>"><br>
        Phone: <input type="text" name="mobile_number" value="<?php echo isset($user['mobile_number']) ? $user['mobile_number'] : ''; ?>"><br>
        Email: <input type="text" disable name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>"><br>
        
        <input type="submit" value="Update Profile">
    </form>
</body>
</html>