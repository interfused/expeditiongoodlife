<?php

// Include part of site URL hash in HTML settings to update when site URL changes
$sitehash = substr( md5( EasyAffiliateLinks::get()->coreUrl ), 0, 8 );

$admin_menu = array(
    'title' => 'Easy Affiliate Links ' . __( 'Settings', 'easy-affiliate-links' ),
    'logo'  => EasyAffiliateLinks::get()->coreUrl . '/img/icon_100.png',
    'menus' => array(
//=-=-=-=-=-=-= GENERAL =-=-=-=-=-=-=
        array(
            'title' => __( 'General', 'easy-affiliate-links' ),
            'name' => 'general',
            'icon' => 'font-awesome:fa-cogs',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __( 'Slug', 'easy-affiliate-links' ),
                    'name' => 'general_section_slug',
                    'fields' => array(
                        array(
                            'type' => 'textbox',
                            'name' => 'link_slug',
                            'label' => __( 'Slug', 'easy-affiliate-links' ),
                            'description' => __( 'Make sure to flush your permalinks after changing this. Direct links to the old slug will be broken.', 'easy-affiliate-links' ),
                            'default' => 'recommends',
                            'validation' => 'required',
                        ),
                        array(
                            'type' => 'html',
                            'name' => 'link_slug_preview' . $sitehash,
                            'binding' => array(
                                'field'    => 'link_slug',
                                'function' => 'eafl_admin_link_slug_preview',
                            ),
                        ),
                    ),
                ),
                array(
                    'type' => 'section',
                    'title' => __( 'Defaults', 'easy-affiliate-links' ),
                    'name' => 'general_section_defaults',
                    'fields' => array(
                        array(
                            'type' => 'radiobutton',
                            'name' => 'link_target',
                            'label' => __( 'Default Target', 'easy-affiliate-links' ),
                            'items' => array(
                                array(
                                    'value' => '_self',
                                    'label' => __( 'Open in same tab', 'easy-affiliate-links' ),
                                ),
                                array(
                                    'value' => '_blank',
                                    'label' => __( 'Open in new tab', 'easy-affiliate-links' ),
                                ),
                            ),
                            'default' => array(
                                '_blank',
                            ),
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'link_redirect_type',
                            'label' => __( 'Default Redirect Type', 'easy-affiliate-links' ),
                            'items' => array(
                                array(
                                    'value' => '301',
                                    'label' => __( '301 Permanent', 'easy-affiliate-links' ),
                                ),
                                array(
                                    'value' => '302',
                                    'label' => __( '302 Temporary', 'easy-affiliate-links' ),
                                ),
                                array(
                                    'value' => '307',
                                    'label' => __( '307 Temporary', 'easy-affiliate-links' ),
                                ),
                            ),
                            'default' => array(
                                '301',
                            ),
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'link_nofollow',
                            'label' => __( 'Default Use Nofollow', 'easy-affiliate-links' ),
                            'default' => '0',
                        ),
                    ),
                ),
	            array(
		            'type' => 'section',
		            'title' => __( 'Permissions', 'easy-affiliate-links' ),
		            'name' => 'general_section_permissions',
		            'fields' => array(
			            array(
				            'type' => 'textbox',
				            'name' => 'editor_button_capability',
				            'label' => __('Shortcode Button Capability', 'easy-affiliate-links'),
				            'description' => __( 'Only users with this role or capability can see the shortcode button in the editor.', 'easy-affiliate-links' ),
				            'default' => 'edit_posts',
			            ),
		            ),
	            ),
            ),
        ),
//=-=-=-=-=-=-= STATISTICS =-=-=-=-=-=-=
        array(
            'title' => __('Statistics', 'easy-affiliate-links'),
            'name' => 'statistics',
            'icon' => 'font-awesome:fa-dashboard',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('General', 'easy-affiliate-links'),
                    'name' => 'statistics_sectoin_general',
                    'fields' => array(
                        array(
                            'type' => 'toggle',
                            'name' => 'statistics_enabled',
                            'label' => __( 'Enable Statistics', 'easy-affiliate-links' ),
                            'default' => '1',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= IMPORT LINKS =-=-=-=-=-=-=
        array(
            'title' => __('Import Links', 'easy-affiliate-links'),
            'name' => 'import_links',
            'icon' => 'font-awesome:fa-upload',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('Import From', 'easy-affiliate-links'),
                    'name' => 'secion_import_links_from',
                    'fields' => array(
                        array(
                            'type' => 'html',
                            'name' => 'import_links_xml' . $sitehash,
                            'binding' => array(
                                'field'    => '',
                                'function' => 'eafl_admin_import_xml',
                            ),
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= EXPORT LINKS =-=-=-=-=-=-=
        array(
            'title' => __('Export Links', 'easy-affiliate-links'),
            'name' => 'export_links',
            'icon' => 'font-awesome:fa-download',
            'controls' => array(
                array(
                    'type' => 'html',
                    'name' => 'export_links_xml' . $sitehash,
                    'binding' => array(
                        'field'    => '',
                        'function' => 'eafl_admin_export_xml',
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= ADVANCED =-=-=-=-=-=-=
        array(
            'title' => __( 'Advanced', 'easy-affiliate-links' ),
            'name' => 'advanced',
            'icon' => 'font-awesome:fa-wrench',
            'controls' => array(
                array(
                    'type' => 'section',
                    'title' => __('Admin', 'easy-affiliate-links'),
                    'name' => 'advanced_section_admin',
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'admin_link_column',
                            'label' => __('Link Column', 'easy-affiliate-links'),
                            'description' => __( 'What to show in the link column on the affiliate links overview page.', 'easy-affiliate-links' ) . '.',
                            'items' => array(
                                array(
                                    'value' => 'shortlink',
                                    'label' => __('Shortlink', 'easy-affiliate-links'),
                                ),
                                array(
                                    'value' => 'external',
                                    'label' => __('External Link', 'easy-affiliate-links'),
                                ),
                            ),
                            'default' => array(
                                'shortlink',
                            ),
                            'validation' => 'required',
                        ),
                    ),
                ),
            ),
        ),
//=-=-=-=-=-=-= CUSTOM CODE =-=-=-=-=-=-=
        array(
            'title' => __( 'Custom Code', 'easy-affiliate-links' ),
            'name' => 'custom_code',
            'icon' => 'font-awesome:fa-code',
            'controls' => array(
                array(
                    'type' => 'codeeditor',
                    'name' => 'custom_code_public_css',
                    'label' => __( 'Public CSS', 'easy-affiliate-links' ),
                    'theme' => 'github',
                    'mode' => 'css',
                ),
            ),
        ),
//=-=-=-=-=-=-= FAQ & SUPPORT =-=-=-=-=-=-=
        array(
            'title' => __( 'FAQ & Support', 'easy-affiliate-links' ),
            'name' => 'faq_support',
            'icon' => 'font-awesome:fa-book',
            'controls' => array(
                array(
                    'type' => 'notebox',
                    'name' => 'faq_support_notebox',
                    'label' => __( 'Need more help?', 'easy-affiliate-links' ),
                    // TODO Support link
                    'description' => '<a href="mailto:support@bootstrapped.ventures" target="_blank">Easy Affiliate Links ' .__( 'FAQ & Support', 'easy-affiliate-links' ) . '</a>',
                    'status' => 'info',
                ),
            ),
        ),
    ),
);