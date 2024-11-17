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

class InterfusedOutConnectCheck extends InterfusedSystemCheck
{
    public function __construct($args)
    {
        $this->args = $args;
        parent::__construct(__('Outgoing HTTP Connections', 'my_theme-admin-td'), 'warning');
    }

    public function check()
    {
        $response = wp_remote_head($this->args['domain']);
        $this->ok = !is_wp_error($response);
        if ($this->ok) {
            $this->info = __('Your server can connect to the themes demo content data', 'my_theme-admin-td');
            $this->value = $response['response']['code'] . ' - ' . $response['response']['message'];
        } else {
            $this->info = __('Your server can not connect to the themes demo content data', 'my_theme-admin-td');
            $this->value = $response->get_error_message();
        }
    }
}
