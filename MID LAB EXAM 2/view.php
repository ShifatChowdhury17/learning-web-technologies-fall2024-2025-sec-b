<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: LogIN.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <h1>All Registered Users</h1>
    <ul>
        <?php
        $users = file("users.txt");
        foreach ($users as $user) {
            list($username, $password, $role) = explode(",", trim($user));
            echo "<li>$username ($role)</li>";
        }
        ?>
    </ul>
    <a href="admin.php">Back to Dashboard</a>
</body>
</html>
