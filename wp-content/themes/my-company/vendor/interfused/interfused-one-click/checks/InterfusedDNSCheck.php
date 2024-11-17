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

class InterfusedDNSCheck extends InterfusedSystemCheck
{
    private $args;

    public function __construct($args)
    {
        $this->args = $args;
        parent::__construct(__('DNS Lookup', 'my_theme-admin-td'), 'warning');
    }

    public function check()
    {
        if (function_exists('gethostbyname')) {
            $ip = gethostbyname($this->args['domain']);

            $this->ok = $ip !== $this->args['domain'];
            $this->value = $ip;
            if ($this->ok) {
                $this->info = __('Your server can lookup ' . $this->args['domain'], 'my_theme-admin-td');
            } else {
                $this->info = __('Your server can NOT lookup ' . $this->args['domain'], 'my_theme-admin-td');
            }
        }
    }
}
