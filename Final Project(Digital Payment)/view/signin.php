<?php

include '../controller/signin_valid.php';

$errors = [];



?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign-In</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/signin.js"></script>
</head>
<body>
    <div class="container">
        <h2>Sign-In</h2>
        <?php if (!empty($errors)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form name="signinForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm()">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="signin">Sign In</button>
        </form>
        <div class="signup-container">
            <p>If you don't have an account, please <a href="signup.php">sign up</a>.</p>
        </div>
        <br><a href="forgot_password.php">Forgot Password?</a>
    </div>
</body>
</html>