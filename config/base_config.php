<?php

namespace config;

class BaseConfig {
    public $BASE_URL;
    
    public function __construct($folderName){
        $this->initConfig($folderName);
    }

    private function initConfig($folderName) {
        $this->setBaseURL($folderName);
    }

    private function setBaseURL($folderName) {
        $protocol = (!empty($_SERVER['HTTPS']) && 
        $_SERVER['HTTPS'] != "off" || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];

        $this->BASE_URL = $protocol . $host . "/" . $folderName;
    }
}

$config = new BaseConfig("rpl1_wimcycle");