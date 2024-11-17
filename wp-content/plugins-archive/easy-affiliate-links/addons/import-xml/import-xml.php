<?php

class EAFL_Import_Xml extends EAFL_Addon {

    public function __construct( $name = 'import-xml' ) {
        parent::__construct( $name );

        // Actions
        add_action( 'admin_init', array( $this, 'assets' ) );
        add_action( 'admin_menu', array( $this, 'import_menu' ) );
        add_action( 'admin_menu', array( $this, 'import_manual_menu' ) );
    }

    public function assets() {
        EasyAffiliateLinks::get()->helper( 'assets' )->add(
            array(
                'file' => $this->addonPath . '/css/import_xml.css',
                'admin' => true,
                'page' => EAFL_POST_TYPE . '_page_eafl_import_xml',
            )
        );
    }

    public function import_menu() {
        add_submenu_page( null, __( 'Import XML', 'easy-affiliate-links' ), __( 'Import XML', 'easy-affiliate-links' ), 'manage_options', 'eafl_import_xml', array( $this, 'import_page' ) );
    }

    public function import_page() {
        if ( !current_user_can('manage_options') ) {
            wp_die( 'You do not have sufficient permissions to access this page.' );
        }

        require( $this->addonDir. '/templates/before_importing.php' );
    }

    public function import_manual_menu() {
        add_submenu_page( null, __( 'Import XML', 'easy-affiliate-links' ), __( 'Import XML', 'easy-affiliate-links' ), 'manage_options', 'eafl_import_xml_manual', array( $this, 'import_manual_page' ) );
    }

    public function import_manual_page() {
        if ( !wp_verify_nonce( $_POST['eafl_submit'], 'eafl_submit' ) ) {
            die( 'Invalid nonce.' );
        }

        $links = simplexml_load_file( $_FILES['xml']['tmp_name'] );

        echo '<h2>Links Imported</h2>';

        $i = 1;
        foreach( $links as $link ) {
            $this->import_xml_link( $link, $i );
            $i++;
        }

        if( $i == 1 ) {
            echo 'No links found';
        }
    }

    public function import_xml_link( $xml_link, $link_number ) {
        $name =         isset( $xml_link->attributes()->name )          ? trim( (string) $xml_link->attributes()->name ) : '';
        $description =  isset( $xml_link->attributes()->description )   ? trim( (string) $xml_link->attributes()->description ) : '';
        $text =         isset( $xml_link->attributes()->text )          ? trim( (string) $xml_link->attributes()->text ) : '';
        $url =          isset( $xml_link->attributes()->url )           ? trim( (string) $xml_link->attributes()->url ) : '';
        $slug =         isset( $xml_link->attributes()->slug )          ? trim( (string) $xml_link->attributes()->slug ) : '';

        $_POST['eafl_name'] = $name;
        $_POST['eafl_description'] = $description;
        $_POST['eafl_text'] = array( $text );
        $_POST['eafl_url'] = $url;
        $_POST['eafl_slug'] = $slug;

        $post = array(
            'post_type'	=> EAFL_POST_TYPE,
            'post_status' => 'publish',
            'post_author' => get_current_user_id(),
        );

        $post_id = wp_insert_post($post);

        echo $link_number . '. <a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">' . $name . '</a><br/>';
    }
}

EasyAffiliateLinks::loaded_addon( 'import-xml', new EAFL_Import_Xml() );