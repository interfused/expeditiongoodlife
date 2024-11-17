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

class InterfusedFSockCheck extends InterfusedSystemCheck
{
    public function __construct($args)
    {
        parent::__construct(__('PHP cURL & fsock', 'my_theme-admin-td'));
    }

    public function check()
    {
        if (function_exists('fsockopen') || function_exists('curl_init')) {
            if (function_exists('fsockopen') && function_exists('curl_init')) {
                $this->info = __('Your server has fsockopen and cURL enabled.', 'my_theme-admin-td');
                $this->value = 'fsockopen & cURL';
            } elseif (function_exists('fsockopen')) {
                $this->info = __('Your server has fsockopen enabled, cURL is disabled.', 'my_theme-admin-td');
                $this->value = 'fsockopen';
            } else {
                $this->info = __('Your server has cURL enabled, fsockopen is disabled.', 'my_theme-admin-td');
                $this->value = 'cURL';
            }
            $this->ok = true;
        } else {
            $this->value = 'None';
            $this->info = __('Your server does not have fsockopen or cURL enabled - Demo content images will not be able to download. Contact your hosting provider.', 'my_theme-admin-td'). '</mark>';
        }
    }
}
