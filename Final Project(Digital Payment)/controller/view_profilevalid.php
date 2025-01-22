<?php

include '../model/model.php';
 
 function getProfile($id){
 return getUser($id);
 }


/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $block_no = trim($_POST['block_no']);
    $data = trim($_POST['data']);

    // PHP validation
    if (empty($block_no)) {
        $errors[] = "Block Number is required.";
    }
    if (empty($data)) {
        $errors[] = "Data is required.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO mined_blocks (block_no, data, user_id) VALUES ('$block_no', '$data', '{$_SESSION['user_id']}')";
        if ($conn->query($sql) === TRUE) {
            echo "Block mined successfully";
            // Set a cookie to indicate successful block mining
            setcookie("block_mined", "true", time() + 3600, "/");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}*/
?>
