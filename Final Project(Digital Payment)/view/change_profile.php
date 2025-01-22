<?php
session_start();
include 'db.php';
include '../controller/change_profilevalid.php';


if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM users WHERE id = $user_id");

if ($result === false) {
    echo "Error fetching user data: " . $conn->error;
    exit();
}

$user = $result->fetch_assoc();

$errors = [];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/change_profile.js"></script>
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
        Phone: <input type="text" name="phone" value="<?php echo isset($user['phone']) ? $user['phone'] : ''; ?>"><br>
        Date of Birth: <input type="date" name="dob" value="<?php echo isset($user['date_of_birth']) ? $user['date_of_birth'] : ''; ?>"><br>
        Gender: <input type="text" name="gender" value="<?php echo isset($user['gender']) ? $user['gender'] : ''; ?>"><br>
        User Type: <input type="text" name="user_type" value="<?php echo isset($user['user_type']) ? $user['user_type'] : ''; ?>"><br>
        <input type="submit" value="Update Profile">
    </form>
</body>
</html>