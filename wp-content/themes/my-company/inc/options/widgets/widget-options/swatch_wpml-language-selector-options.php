<?php
/**
 * Test Options Page
 *
 * @package mycompany
 * @subpackage options-pages
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

return array(
    'sections'   => array(
        'twitter-section' => array(
            'fields' => array(
                array(
                    'name' => __('Show language as', 'my_theme-admin-td'),
                    'id' => 'display',
                    'type' => 'select',
                    'default' => 'name',
                    'options' => array(
                        'name'     => __('Name', 'my_theme-admin-td'),
                        'code'     => __('Country Code', 'my_theme-admin-td'),
                        'flag'     => __('Flag', 'my_theme-admin-td'),
                        'nameflag' => __('Name & Flag', 'my_theme-admin-td')
                    )
                ),
                array(
                    'name' => __('Order languages by', 'my_theme-admin-td'),
                    'id' => 'order',
                    'type' => 'select',
                    'default' => 'id',
                    'options' => array(
                        'id'   => __('ID', 'my_theme-admin-td'),
                        'code' => __('Code', 'my_theme-admin-td'),
                        'name' => __('Name', 'my_theme-admin-td')
                    ),
                ),
                array(
                    'name' => __('Order direction', 'my_theme-admin-td'),
                    'id' => 'orderby',
                    'type' => 'select',
                    'default' => 'id',
                    'options' => array(
                        'asc'   => __('Ascending', 'my_theme-admin-td'),
                        'desc' => __('Descending', 'my_theme-admin-td'),
                    ),
                ),
                array(
                    'name' => __('Skip Missing Languages', 'my_theme-admin-td'),
                    'id' => 'skip_missing',
                    'type' => 'select',
                    'default' => '1',
                    'options' => array(
                        '1' => __('Skip', 'my_theme-admin-td'),
                        '0' => __('Dont Skip', 'my_theme-admin-td'),
                    ),
                    'desc' => __('Skip languages with no translations.', 'my_theme-admin-td')
                ),
            )//fields
        )//section
    )//sections
);//array
