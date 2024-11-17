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
            'title'   => __('Twitter', 'my_theme-admin-td'),
            'header'  => __('Twitter feed options','my_theme-admin-td'),
            'fields' => array(
                'title' => array(
                    'name' => __('Widget Title', 'my_theme-admin-td'),
                    'id' => 'title',
                    'type' => 'text',
                    'default' => "",
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                ),
                'account' => array(
                    'name' => __('Twitter username', 'my_theme-admin-td'),
                    'id' => 'account',
                    'type' => 'text',
                    'default' => "envato",
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                ),
                'consumer_key' => array(
                    'name' => __('Consumer Key', 'my_theme-admin-td'),
                    'id' => 'consumer_key',
                    'type' => 'text',
                    'default' => "",
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                ),
                'consumer_secret' => array(
                    'name' => __('Consumer Secret', 'my_theme-admin-td'),
                    'id' => 'consumer_secret',
                    'type' => 'text',
                    'default' => "",
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                ),
                'access_token' => array(
                    'name' => __('Access Token', 'my_theme-admin-td'),
                    'id' => 'access_token',
                    'type' => 'text',
                    'default' => "",
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                ),
                'access_token_secret' => array(
                    'name' => __('Access Token Secret', 'my_theme-admin-td'),
                    'id' => 'access_token_secret',
                    'type' => 'text',
                    'default' => "",
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                ),

                'show'   => array(
                    'name'       =>  __('Maximum number of tweets to show', 'my_theme-admin-td'),
                    'id'         => 'show',
                    'type'       => 'select',
                    'options'    =>  array(
                              1  => 1,
                              2  => 2,
                              3  => 3,
                              4  => 4,
                              5  => 5,
                              6  => 6,
                              7  => 7,
                              8  => 8,
                              9  => 9,
                              10 => 10
                    ),
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                    'default'   => 5,
                ),


                'hidereplies' => array(
                    'name'      => __('Hide replies', 'my_theme-admin-td'),
                    'id'        => 'hidereplies',
                    'type'      => 'radio',
                    'default'   =>  'on',
                    'options' => array(
                        'on'   => __('Hide', 'my_theme-admin-td'),
                        'off'  => __('Show', 'my_theme-admin-td'),
                    ),
                ),

                'hidepublicized' => array(
                    'name'      => __('Hide Tweets pushed by Publicize', 'my_theme-admin-td'),
                    'id'        => 'hidepublicized',
                    'type'      => 'radio',
                    'default'   =>  'on',
                    'options' => array(
                        'on'   => __('Hide', 'my_theme-admin-td'),
                        'off'  => __('Show', 'my_theme-admin-td'),
                    ),
                ),

                'includeretweets' => array(
                    'name'      => __('Include retweets', 'my_theme-admin-td'),
                    'id'        => 'include_retweets',
                    'type'      => 'radio',
                    'default'   =>  'on',
                    'options' => array(
                        'off' => __('No', 'my_theme-admin-td'),
                        'on'  => __('Yes', 'my_theme-admin-td'),
                    ),
                ),

                'followbutton' => array(
                    'name'      => __('Display Follow Button', 'my_theme-admin-td'),
                    'id'        => 'follow_button',
                    'type'      => 'radio',
                    'default'   =>  'on',
                    'options' => array(
                        'off' => __('Hide', 'my_theme-admin-td'),
                        'on'  => __('Show', 'my_theme-admin-td'),
                    ),
                ),

                'beforetimesince' => array(
                    'name' => __('Text to display between Tweet and timestamp:', 'my_theme-admin-td'),
                    'id' => 'beforetimesince',
                    'type' => 'text',
                    'default' => "",
                    'attr'      =>  array(
                        'class'    => 'widefat',
                    ),
                ),

            )//fields
        )//section
    )//sections
);//array
