<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
    $id = trim($_POST['id']);
    $role = trim($_POST['role']);

 
    if (empty($username) || empty($password) || empty($cpassword) || empty($id) || empty($role)) {
        echo "All fields must be filled.";
    } 
    else if ($password !== $cpassword) {
        echo "Passwords do not match.";
    } 
    else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $user_data = "$username,$hashed_password,$role\n";
        file_put_contents("users.txt", $user_data, FILE_APPEND);

        header('Location: LogIN.php');
        exit;
    }
} else {

    header('Location: RegForm.html');
    exit;
}
?>
