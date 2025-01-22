<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $mobileNumber = trim($_POST["mobile_number"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirm_password"]);
    $accountType = trim($_POST["account_type"]);

    // PHP validation
    if (empty($fullName)) {
        $errors[] = "Full Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!isValidEmail($email)) {
        $errors[] = "Invalid email format.";
    } elseif (!isUniqueEmail($email, $conn)) {
        $errors[] = "This email is already registered. Please use a different one.";
    }
    if (empty($mobileNumber)) {
        $errors[] = "Mobile Number is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8 || !preg_match('/[^a-zA-Z\d]/', $password)) {
        $errors[] = "Invalid password. It must be at least 8 characters long and include at least one special character.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match. Please re-enter.";
    }
    if (empty($accountType)) {
        $errors[] = "You must select an account type to continue.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (full_name, email, mobile_number, password, account_type) VALUES ('$fullName', '$email', '$mobileNumber', '$password', '$accountType')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Sign-up successful. Redirecting to sign-in page...";
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>