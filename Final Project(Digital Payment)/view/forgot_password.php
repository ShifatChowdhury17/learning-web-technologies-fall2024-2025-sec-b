<?php
session_start();
include '../controller/forgot_profilevalid.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "digital_payment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/forgot_password.js"></script>
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
    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
    ?>
    <form name="emailForm" method="post" action="" onsubmit="return validateEmailForm()">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <button type="submit" name="send_code">Send Code</button>
    </form>

    <form name="passwordForm" method="post" action="" onsubmit="return validatePasswordForm()">
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit" name="update_password">Update Password</button>
    </form>
</body>
</html>