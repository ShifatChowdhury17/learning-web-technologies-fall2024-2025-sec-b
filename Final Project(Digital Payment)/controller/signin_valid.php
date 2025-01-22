<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signin"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // PHP validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["user_id"] = $row["id"];
                $
                setcookie("session_start", time(), time() + 3600, "/");
                header("Location: edit_profile.php");
                exit();
            } else {
                $errors[] = "Email or password is incorrect!";
            }
        } else {
            $errors[] = "Email or password is incorrect!";
        }
    }
}
?>