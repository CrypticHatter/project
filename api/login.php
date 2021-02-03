<?php
require_once '../auth-class.php';

global $conn;

$email = $_POST['email'];
$password = $_POST['password'];

$res = AuthClass::login($email, $password);

if($res){
    echo json_encode(['message' => "success", 'email' => $email]);
}else{
    echo json_encode(['message' => "failed"]);
}
