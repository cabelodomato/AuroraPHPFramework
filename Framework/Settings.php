<?php
namespace Aurora;

class Settings{
    var $settings = array();

    public function __construct() {
        $this->setSettings();
    }

    private function setSettings() {
        $settings = [];
        #Sort out the language
        $language = isset($_GET['language']) ? $_GET['language'] : "EN";

        #Sort out the currency
        $currency = isset($_GET['currency']) ? $_GET['currency'] : "AUD";

        #Pass settings to the class
        $this->settings = array(
            "language" => $language,
            "currency" => $currency
        );
    }
    public function set($name,$value){
        $this->settings[$name] = $value;
    }
    public function get($name) {
        return $this->settings[$name];
    }
    public function getSettings() {
        return $this->settings;
    }

}
