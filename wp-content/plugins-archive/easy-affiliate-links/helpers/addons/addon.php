<?php

class EAFL_Addon {

    public $addonPath;
    public $addonDir;
    public $addonUrl;
    public $addonName;

    public function __construct( $name )
    {
        $this->addonPath = '/addons/' . $name;
        $this->addonDir = EasyAffiliateLinks::get()->coreDir . $this->addonPath;
        $this->addonUrl = EasyAffiliateLinks::get()->coreUrl . $this->addonPath;
        $this->addonName = $name;
    }
}