<?php

namespace config;

class BaseConfig {
    public $BASE_URL;

    public function initConfig() {
        $this->setBaseURL("rpl2_wimcycle");
    }

    public function setBaseURL(string $folderName) {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off"
        || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        // $path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

        $this->BASE_URL = $protocol . $host . "/" . $folderName;
    }
}

$config = new BaseConfig();
$config->initConfig();