<?php
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $con = new mysqli("localhost", "root", "", "form");
    if($con->connect_error){
        die("Failed to connext. ".$con->connect_error);
    }else{
        $stmt = $con->prepare("SELECT * FROM `login` WHERE Username = ?");
        $stmt->bind_param("s",$userName);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result -> num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['Password'] === $password){
                header('Location: http://127.0.0.1:5500/Traditional%20Cloth/shop.html');
            }else{
                echo "<h2>Invalid Password.</h2>";
            }
        }else{
            echo "<h2>Invalid Username or Password.</h2>";
        }
    }
?>