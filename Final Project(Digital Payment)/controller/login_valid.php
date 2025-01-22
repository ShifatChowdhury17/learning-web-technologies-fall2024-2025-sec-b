<?php
include '../model/model.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $errors = [];

    // PHP validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } 

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $res=validLogin($email,$password);

        if(mysqli_num_rows($res)> 0 ) {
            $user = $res->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] =$user['email'];
            setcookie("user_id", $user['id'], time() + (86400 * 30), "/"); // 30 days
            header("Location: dashbored.php");
            exit();
            echo $_SESSION['user_id'];
        } else {
            $errors[] = "Invalid email or password.";
        }
       
    }
}