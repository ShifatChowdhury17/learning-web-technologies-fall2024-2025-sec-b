<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: LogIN.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Your Profile</h1>
    <p>Username: <?php echo $_SESSION['username']; ?></p>
    <p>Role: <?php echo $_SESSION['role']; ?></p>
    <a href="<?php echo $_SESSION['role'] == 'admin' ? 'admin.php' : 'user.php'; ?>">Back to Dashboard</a>
</body>
</html>
