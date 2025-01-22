<?php

include '../model/model.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $block_no = $_POST['block_no'];
    $data = $_POST['transaction'];
    $user_id = $_POST['user_id'];

    if (empty($block_no) || empty($data) || empty($user_id)) {
        $errors[] = "All fields must be filled out";
    }

    if (empty($errors)) {
        insertBlock($block_no, $data, $user_id);
        echo "Insert Successfully";
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>