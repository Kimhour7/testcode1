<?php
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];

    $con = new mysqli("localhost", "root", "", "form");
    if($con->connect_error){
        die("Failed to connext. ".$con->connect_error);
    }else{
        if(!empty($userName) && !empty($password) && !empty($con_password)){
            if($password === $con_password){
                $query = "INSERT INTO `login`(`Username`, `Password`) VALUES ('$userName','$password')";
                mysqli_query($con, $query);
                header('Location: http://127.0.0.1:5500/Traditional%20Cloth/shop.html');
            }else{
                echo "<script>alert('Invalid confirm password.')</script>";
            }
        }else{
            echo "<script>alert('You\'re not input the fill.')</script>";
        }
    }
?>