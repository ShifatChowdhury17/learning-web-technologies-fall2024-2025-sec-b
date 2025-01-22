<?php
include '../model/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    
    if ($newPassword == $confirmPassword && strlen($newPassword) >= 8 && preg_match('/[^a-zA-Z\d]/', $newPassword)) {
        $email_id=$_SESSION['email'];
       // echo var_dump($email_id);
        $sql = "UPDATE users SET password = '$newPassword' WHERE email='$email_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Password successfully updated!";
            header('Location: change_password.php');
        } else {
            $errors[] = "Error updating password: " . $conn->error;
        }
    } else {
        $errors[] = "Passwords do not match or do not meet the requirements!";
    }
    
}
?>