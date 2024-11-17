<?php

class EAFL_Premium_Addon {

    public $addonPath;
    public $addonDir;
    public $addonUrl;
    public $addonName;

    public function __construct( $name )
    {
        $this->addonPath = '/addons/' . $name;
        $this->addonDir = EasyAffiliateLinksPremium::get()->premiumDir . $this->addonPath;
        $this->addonUrl = EasyAffiliateLinksPremium::get()->premiumDir . $this->addonPath;
        $this->addonName = $name;
    }
}