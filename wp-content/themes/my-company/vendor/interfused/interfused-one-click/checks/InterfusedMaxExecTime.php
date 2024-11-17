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

class InterfusedMaxExecTime extends InterfusedSystemCheck
{
    private $args;

    public function __construct($args)
    {
        $this->args = $args;
        parent::__construct(__('PHP', 'my_theme-admin-td') . ' - ' . 'max_execution_time');
    }

    public function check()
    {
        $this->value = ini_get('max_execution_time');
        // check for 0 as well for infinite time
        $this->ok = $this->value == 0 || $this->value >= $this->args['value'];
        // add extra info if not ok
        if (!$this->ok) {
             $this->info = sprintf(__('We recommend setting %s to at least %s. See: <a href="%s">Increasing memory allocated to PHP</a>', 'my_theme-admin-td'),'max_execution_time', $this->args['value'], 'http://php.net/manual/en/configuration.changes.php') . '</span>';
        }
    }
}
