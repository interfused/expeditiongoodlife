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

class InterfusedWPMemoryCheck extends InterfusedSystemCheck
{
    private $wanted_limit;
    private $actual_limit;

    public function __construct($args)
    {
        $this->wanted_limit = $this->ini_to_num($args['limit']);
        parent::__construct(__('WP Memory Limit', 'my_theme-admin-td'));
    }

    public function check()
    {
        $this->actual_limit = $this->ini_to_num(WP_MEMORY_LIMIT);
        $this->value = WP_MEMORY_LIMIT;
        $this->ok = $this->actual_limit >= $this->wanted_limit;
        // add extra info if not ok
        if (!$this->ok) {
             $this->info = sprintf(__('We recommend setting memory to at least %s. See: <a href="%s">Increasing memory allocated to PHP</a>', 'my_theme-admin-td'), size_format($this->wanted_limit), 'http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP') . '</span>';
        }
    }
}
