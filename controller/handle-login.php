<?php

require_once "../Storage/data_user.php";
require_once "../config/base_config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$user_ditemukan = null;
$email_ditemukan = null;
$pesan_error = [];

// Cek apakah emailnya terdaftar atau tidak
foreach($data_user as $user) {
    if($user['email'] == $email) {
        $email_ditemukan = $user['email'];
    }
}

if(!$email_ditemukan) {
    header("Location: $config->BASE_URL/dashboard/login?type=email&error=Email tidak ditemukan!");
    return;
}

foreach($data_user as $user) {
    // Cek email dan password
    if($user['email'] == $email && $user['password'] == md5($password)) {
        $user_ditemukan = $user;
    }
}

if(count($pesan_error) > 0) {
    echo $pesan_error['message'];
    return;
}

if($user_ditemukan != null) {
    session_start();
    $_SESSION['name'] = $user_ditemukan['name'];
    header("Location: $config->BASE_URL/dashboard?success=Login berhasil, selamat datang {$user_ditemukan['name']}!");
} else {
    header("Location: $config->BASE_URL/dashboard/login?error=Login gagal cuy!");
}

