
<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $dob = $_POST['dob'];
    $email = trim($_POST['email']);
    $id = trim($_POST['id']);
    $gender = $_POST['gender'];
    $dept = $_POST[('dept')];
    $address = $_POST[('address')];

    if($username == null|| empty($dob) || empty($password) || empty($email) || empty($id) || empty($gender) || $address = null|| empty($dept) )
    {
        echo "All Section Must be Field";
    }
    //else if($username == $password){
        //echo "valid user!";

        //$_SESSION['xyz'] = true;
       // header('location: home.php');
    //}
    else{
        echo "Invalid user!";
    }
}else{
    header('location: RegForm.html');
}
?>
