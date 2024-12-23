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

class InterfusedZipCheck extends InterfusedSystemCheck
{
    private $args;

    public function __construct($args)
    {
        $this->args = $args;
        parent::__construct($this->args['name'], 'warning');
    }

    public function check()
    {
        $this->ok = false;
        $this->value = 'disabled';
        $this->info = $this->args['fail_message'];

        if (function_exists('unzip_file') === true || class_exists('ZipArchive') === true) {
            $this->info = $this->args['ok_message'];
            $this->ok = true;
            $this->value = 'enabled';
        }
    }
}
