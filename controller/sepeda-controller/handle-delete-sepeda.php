<?php
    require_once "../../config/base_config.php";

    $id = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if(!$id) {
        header("Location: $config->BASE_URL/dashboard?error=id sepeda tidak ditemukan!");
        return;
    }

?>