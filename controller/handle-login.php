<?php

$email = $_POST['email'];
$password = $_POST['password'];

if(!$email) {
    echo "Email tidak valid";
    return;
} 

print_r($email);
print_r($password);