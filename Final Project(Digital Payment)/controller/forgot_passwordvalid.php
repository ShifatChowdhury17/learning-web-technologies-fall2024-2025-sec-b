<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send_code"])) {
    $email = $_POST["email"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $code = rand(100000, 999999);
            echo "Code has been sent! Your code is: $code";
            $_SESSION["reset_code"] = $code;
            $_SESSION["reset_email"] = $email;
        } else {
            $errors[] = "Email not found!";
        }
    } else {
        $errors[] = "Invalid email format!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_password"])) {
    $code = $_POST["code"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($code == $_SESSION["reset_code"]) {
        if ($newPassword == $confirmPassword && strlen($newPassword) >= 8 && preg_match('/[^a-zA-Z\d]/', $newPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $email = $_SESSION["reset_email"];
            $sql = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            if ($conn->query($sql) === TRUE) {
                echo "Password successfully updated!";
                session_unset();
                session_destroy();
            } else {
                $errors[] = "Error updating password: " . $conn->error;
            }
        } else {
            $errors[] = "Passwords do not match or do not meet the requirements!";
        }
    } else {
        $errors[] = "Invalid code!";
    }
}


?>