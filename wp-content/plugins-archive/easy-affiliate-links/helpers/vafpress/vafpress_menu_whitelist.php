<?php

function eafl_admin_link_slug_preview( $slug )
{
    return site_url( '/'.$slug.'/' );
}

function eafl_admin_import_xml()
{
    $example = '<a href="' . EasyAffiliateLinks::get()->coreUrl . '/static/links.xml" target="_blank">' . __( 'Example XML file', 'easy-affiliate-links' ) . '</a>';
    return '<a href="'.admin_url( 'edit.php?post_type=' . EAFL_POST_TYPE . '&page=eafl_import_xml' ).'" class="button button-primary" target="_blank">'.__('Import XML', 'easy-affiliate-links').'</a><br/>' . $example;
}

function eafl_admin_export_xml()
{
    return '<a href="'.admin_url( 'edit.php?post_type=' . EAFL_POST_TYPE . '&page=eafl_export_xml' ).'" class="button button-primary" target="_blank">'.__('Export XML', 'easy-affiliate-links').'</a>';
}

VP_Security::instance()->whitelist_function( 'eafl_admin_link_slug_preview' );
VP_Security::instance()->whitelist_function( 'eafl_admin_import_xml' );
VP_Security::instance()->whitelist_function( 'eafl_admin_export_xml' );