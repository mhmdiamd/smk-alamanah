<?php

require_once "../Storage/data_user.php";
require_once "../config/base_config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$user_ditemukan = null;

foreach($data_user as $user) {
    // Cek email dan password
    if($user['email'] == $email 
    && $user['password'] == md5($password)) {
       $user_ditemukan = $user;
    }
}

if($user_ditemukan != null) {
    echo "User Ditemukan {$user_ditemukan['name']}";
} else {
    print_r("User tidak ditemukan");
    header("Location: $config->BASE_URL/dashboard/login?error=Login gagal cuy!");
}

