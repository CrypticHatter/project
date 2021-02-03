<?php
require_once '../auth-class.php';

global $conn;

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$res = AuthClass::signup($email, $password);
if($res){
    echo "success";
}else{
    echo "failed";
}




