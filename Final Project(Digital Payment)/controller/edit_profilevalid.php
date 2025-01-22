<?php

include '../model/model.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $phone = $_POST['mobile_number'];
    $email = $_POST['email'];

    
    if (empty($full_name) || empty($phone) ) {
        $errors[] = "All fields must be filled out";
    }
    if (!preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Phone number must be 10 digits";
    }

    if (empty($errors)) {
        updateUser($_SESSION['user_id'], $full_name, $phone);
        
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>