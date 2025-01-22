<?php
session_start();
include '../controller/view_profilevalid.php';


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$persent =getProfile( $_SESSION['user_id']);

$errors = [];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Mine Blocks</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/view_profile.js"></script>
    <style>
        
    </style>

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
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; color: #333;">
    <div style="width: 80%; max-width: 800px; margin: 50px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; color: #007bff; margin-bottom: 20px;">Show Profile</h1>
        <p style="font-size: 1.2em; margin: 10px 0; padding: 10px; border-bottom: 1px solid #ddd;">
            <b style="font-weight: bold; color: #555;">ID:</b> <?php echo $persent['id']; ?>
        </p>
        <p style="font-size: 1.2em; margin: 10px 0; padding: 10px; border-bottom: 1px solid #ddd;">
            <b style="font-weight: bold; color: #555;">Full Name:</b> <?php echo $persent['full_name']; ?>
        </p>
        <p style="font-size: 1.2em; margin: 10px 0; padding: 10px; border-bottom: 1px solid #ddd;">
            <b style="font-weight: bold; color: #555;">Email:</b> <?php echo $persent['email']; ?>
        </p>
        <p style="font-size: 1.2em; margin: 10px 0; padding: 10px; border-bottom: 1px solid #ddd;">
            <b style="font-weight: bold; color: #555;">Mobile Number:</b> <?php echo $persent['mobile_number']; ?>
        </p>
        <p style="font-size: 1.2em; margin: 10px 0; padding: 10px; border-bottom: 1px solid #ddd;">
            <b style="font-weight: bold; color: #555;">Account Type:</b> <?php echo $persent['account_type']; ?>
        </p>
        <p style="font-size: 1.2em; margin: 10px 0; padding: 10px;">
            <b style="font-weight: bold; color: #555;">Created At:</b> <?php echo $persent['created_at']; ?>
        </p>
    </div>
</body>

</html>