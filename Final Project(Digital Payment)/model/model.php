<?php
   include 'db.php';
   
   function updateUser($id, $fullname, $phone)
    {
        $con = mysqli_connect('localhost', 'root', '', 'digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        $stmt = $con->prepare("UPDATE users SET full_name = ?, mobile_number = ? WHERE id = ?");
        if (!$stmt) {
            die('SQL prepare failed: ' . mysqli_error($con));
        }
        $stmt->bind_param("ssi", $fullname, $phone, $id); 
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "User details updated successfully.";
        } else {
            echo "No changes made or user not found.";
        }
        $stmt->close();
        mysqli_close($con);
   }


   function getUser($id)
    {
        
        $con = mysqli_connect('localhost','root','','digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        
        $stmt = $con->prepare("SELECT * FROM users WHERE id = ?" );
        $stmt->bind_param("s", $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        mysqli_close($con);

        return $user;
    }


   function validLogin($email, $password)
    {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $con = mysqli_connect('localhost','root','','digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        if (!$stmt) {   
            die('SQL prepare failed: ' . mysqli_error($con));
        }
        
        
        $stmt->bind_param("ss", $email, $password );
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        mysqli_close($con);

        return $result;
    }

    function getBlocks() 
    {
        $con = mysqli_connect('localhost', 'root', '', 'digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        $sql = "SELECT * FROM blocks ORDER BY created_at DESC";
        $result = mysqli_query($con, $sql);

        $blocks = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $blocks[] = $row; 
        }

        mysqli_close($con);

        return $blocks; 
    }

    function getLatestBlock($id)
    {
        $con = mysqli_connect('localhost', 'root', '', 'digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        if ($id) {
            
            $stmt = $con->prepare("SELECT * FROM blocks WHERE id = ? ORDER BY created_at DESC LIMIT 1");
            $stmt->bind_param("i", $id);
        } else {
            $stmt = $con->prepare("SELECT * FROM blocks ORDER BY created_at DESC LIMIT 1");
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $block = $result->fetch_assoc();

        $stmt->close();
        mysqli_close($con);  
        return $block; 
    }

    function insertBlock($block_no, $transaction, $user_idd)
    {
        $con = mysqli_connect('localhost', 'root', '', 'digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        $stmt = $con->prepare("INSERT INTO blocks (block_no, transaction, user_idd, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("isi", $block_no, $transaction, $user_idd);

        if ($stmt->execute()) {
            $insertedId = $stmt->insert_id; 
            $stmt->close();
            mysqli_close($con);
            return $insertedId; 
        } else {
            $stmt->close();
            mysqli_close($con);
            return false; 
        }
    }

    function insertVerifyBlock($block_no, $transaction, $user_idd)
    {
        $con = mysqli_connect('localhost', 'root', '', 'digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        $stmt = $con->prepare("INSERT INTO verify_block_table (block_no, transaction, user_idd, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("isi", $block_no, $transaction, $user_idd);

        if ($stmt->execute()) {
            $insertedId = $stmt->insert_id; 
              $stmt->close();
            mysqli_close($con);
            return $insertedId; 
        } else {
            $stmt->close();
            mysqli_close($con);
            return false; 
        }
    }

    function getVerifiedBlocks() 
    {
        $con = mysqli_connect('localhost', 'root', '', 'digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        $sql = "SELECT * FROM verify_block_table ORDER BY created_at DESC";
        $result = mysqli_query($con, $sql);

        $blocks = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $blocks[] = $row; 
        }

        mysqli_close($con);

        return $blocks; 
    }

    function deleteBlock($id) 
    {
        $con = mysqli_connect('localhost', 'root', '', 'digital_payment');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        $sql = "DELETE FROM blocks WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            
            mysqli_stmt_bind_param($stmt, "i", $id);
            
            
            if (mysqli_stmt_execute($stmt)) {
                $affectedRows = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($con);
                
                
                if ($affectedRows > 0) {
                    return "Block deleted successfully!";
                } else {
                    return "Block not found or already deleted.";
                }
            } else {
                $error = mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($con);
                return "Error deleting block: $error";
            }
        } else {
            mysqli_close($con);
            return "Error preparing delete statement.";
        }
    }


?>