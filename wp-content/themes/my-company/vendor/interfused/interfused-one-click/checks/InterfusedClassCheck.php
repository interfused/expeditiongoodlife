<?php
/**
 * One Click System Check
 *
 * @package One Click Installer
 * @subpackage Admin
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 * @author Interfused.com
 */

require_once PM_ONECLICK_DIR . 'inc/InterfusedSystemCheck.php';

class InterfusedClassCheck extends InterfusedSystemCheck
{
    private $args;

    public function __construct($args)
    {
        $this->args = $args;
        parent::__construct($this->args['name']);
    }

    public function check()
    {
        if ( class_exists($this->args['value']) ) {
            $this->info = $this->args['ok_message'];
            $this->value = 'enabled';
            $this->ok = true;
        }
        else {
            $this->info = $this->args['fail_message'];
            $this->value = 'disabled';
            $this->ok = false;
        }
    }
}
