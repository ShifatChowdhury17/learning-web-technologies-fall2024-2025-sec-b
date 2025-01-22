<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $user_type = $_POST['user_type'];

    // PHP validation
    if (empty($full_name) || empty($phone) || empty($dob) || empty($gender) || empty($user_type)) {
        $errors[] = "All fields must be filled out";
    }
    if (!preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Phone number must be 10 digits";
    }

    if (empty($errors)) {
        $update_query = "UPDATE users SET full_name='$full_name', phone='$phone', date_of_birth='$dob', gender='$gender', user_type='$user_type' WHERE id=$user_id";
        if ($conn->query($update_query) === TRUE) {
            echo "Profile updated successfully";
            // Set a cookie to indicate successful update
            setcookie("profile_updated", "true", time() + 3600, "/");
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>