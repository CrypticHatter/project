<?php
include_once('db.php');

class AuthClass{

    public static function signup($email, $password){
        global $conn;
        
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        $result = $conn->conn->query($sql);

        // var_dump($conn->conn->error);die;
        return $result;
    }

    public static function login($email, $password){
        global $conn;
        
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->conn->query($sql);
        $result = mysqli_fetch_assoc($result);
        //print_r(mysqli_fetch_assoc($result));
        if (password_verify($password, $result['password'])) {
            return true;
        }else{
            return false;
        }
    }

    public static function deleteCookie(){
        setcookie('email', '', time() - 86400, "/");
        return true;
    }
}