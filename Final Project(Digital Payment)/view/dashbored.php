<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    //header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../auth.css">
    <script src="../asset/dashbored.js"></script>
    <style>
        body {
            background-image: url('../images/digital-payment-bg.jpg'); /* Add your image path here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            color:rgb(14, 3, 65);
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        ul {
            list-style: none;
            padding: 0;
            max-width: 600px;
            margin: 30px auto;
            background-color: rgba(33, 20, 93, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        li {
            margin: 15px 0;
        }

        li a {
            display: block;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        li a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        b {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>
    <form name="dashboardForm" method="post" action="dashboard_handler.php" onsubmit="return validateForm()">
        <ul>
            <li><a href="view_profile.php"><b>View Profile</b></a></li>
            
            <li><a href="edit_profile.php"><b>Edit Profile</b></a></li>
            <li><a href="latest_blocks.php"><b>Latest Block Insert</b></a></li>
            <li><a href="mine_blocks.php"><b>Mine Block List</b></a></li>
            <li><a href="verify_blocks.php"><b>Verify Block List</b></a></li>
             <li><a href="sendmoney.php"><b>Send Money</b></a></li>
             <li><a href="addmoney.php"><b>Add Money</b></a></li>
             <li><a href="billpayment.php"><b>Bill Payment</b></a></li>
             <li><a href="publicledger.php"><b>Public Ledger</b></a></li>
            <li><a href="change_password.php"><b>Change Password</b></a></li>
            

            <li><a href="logout.php"><b>Log Out</b></a></li>
        </ul>
    </form>
</body>
</html>
