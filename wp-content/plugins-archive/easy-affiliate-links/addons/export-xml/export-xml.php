<?php

class EAFL_Export_Xml extends EAFL_Addon {

    public function __construct( $name = 'export-xml' ) {
        parent::__construct( $name );

        // Actions
        add_action( 'admin_menu', array( $this, 'export_menu' ) );
    }

    public function export_menu() {
        add_submenu_page( null, __( 'Export XML', 'easy-affiliate-links' ), __( 'Export XML', 'easy-affiliate-links' ), 'manage_options', 'eafl_export_xml', array( $this, 'export_page' ) );
    }

    public function export_page() {
        if ( !current_user_can('manage_options') ) {
            wp_die( 'You do not have sufficient permissions to access this page.' );
        }

        echo '<h2>XML Export</h2>';

        $links = EasyAffiliateLinks::get()->helper( 'cache' )->get( 'links_by_date' );

        if( count( $links ) == 0 ) {
            _e( "There are no links to export.", 'easy-affiliate-links' );
        } else {
            $xml_data = array(
                'name' => 'links',
            );

            foreach( $links as $link ) {
                $xml_data[] = $this->export_xml_link( $link );
            }

            $doc = new DOMDocument();
            $child = $this->generate_xml_element( $doc, $xml_data );
            if ( $child ) {
                $doc->appendChild( $child );
            }
            $doc->formatOutput = true; // Add whitespace to make easier to read XML
            $xml = $doc->saveXML();

            echo '<form id="exportLinks" action="' . $this->addonUrl . '/templates/download.php" method="post">';
            echo '<input type="hidden" name="exportLinks" value="' . base64_encode( $xml ) . '"/>';
            submit_button( __( 'Download XML', 'easy-affiliate-links' ) );
            echo '</form>';
        }
    }

    public function export_xml_link( $link ) {

        $xml = array(
            'name' => 'link',
            'attributes' => array(
                'name' =>           isset( $link['name'] )          ? $link['name'] : '',
                'description' =>    isset( $link['description'] )   ? $link['description'] : '',
                'text' =>           isset( $link['text'] )          ? $link['text'][0] : '',
                'url' =>            isset( $link['url'] )           ? $link['url'] : '',
                'slug' =>           isset( $link['slug'] )          ? $link['slug'] : '',
            ),
        );

        return $xml;
    }

    /**
     * Helper functions
     */
    // Source: http://www.viper007bond.com/2011/06/29/easily-create-xml-in-php-using-a-data-array/
    private function generate_xml_element( $dom, $data ) {
        if ( empty( $data['name'] ) )
            return false;

        // Create the element
        $element_value = ( ! empty( $data['value'] ) ) ? $data['value'] : null;
        $element = $dom->createElement( $data['name'], $element_value );

        // Add any attributes
        if ( ! empty( $data['attributes'] ) && is_array( $data['attributes'] ) ) {
            foreach ( $data['attributes'] as $attribute_key => $attribute_value ) {
                $element->setAttribute( $attribute_key, $attribute_value );
            }
        }

        // Any other items in the data array should be child elements
        foreach ( $data as $data_key => $child_data ) {
            if ( ! is_numeric( $data_key ) )
                continue;

            $child = $this->generate_xml_element( $dom, $child_data );
            if ( $child )
                $element->appendChild( $child );
        }

        return $element;
    }
}

EasyAffiliateLinks::loaded_addon( 'export-xml', new EAFL_Export_Xml() );