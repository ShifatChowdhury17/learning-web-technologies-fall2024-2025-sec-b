<?php
session_start();
include 'db.php';
include '../controller/signup_valid.php';

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isUniqueEmail($email, $conn) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result->num_rows == 0;
}

$errors = [];


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign-Up</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/signup.js"></script>
</head>
<body>
    <h1>Sign-Up</h1>
    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form name="signupForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm()">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name"  onkeyup="showHint(this.value)"><br>
        <p><span id="txtHint"></span></p>

        <label>Email:</label>
        <input type="text" id="email" name="email" ><br>

        <label for="mobile_number">Mobile Number:</label>
        <input type="text" id="mobile_number" name="mobile_number" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <label for="account_type">Account Type:</label>
        <select id="account_type" name="account_type" required>
            <option value="">Select Account Type</option>
            <option value="user">User</option>
            <option value="miner">Miner</option>
        </select><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
</html>