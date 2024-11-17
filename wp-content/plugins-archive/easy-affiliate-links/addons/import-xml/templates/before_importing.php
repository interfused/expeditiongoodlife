<div class="wrap eafl-import">

    <div id="icon-themes" class="icon32"></div>
    <h2><?php _e( 'Import XML', 'easy-affiliate-links' ); ?></h2>
    <h3><?php _e( 'Before importing', 'easy-affiliate-links' ); ?></h3>
    <ol>
        <li><?php _e( "It's a good idea to backup your WP database before using the import feature.", 'easy-affiliate-links' ); ?></li>
        <li>Select the XML file containing links in the Easy Affiliate Links format:</li>
    </ol>
    <form method="POST" action="<?php echo admin_url( 'edit.php?post_type=' . EAFL_POST_TYPE . '&page=eafl_import_xml_manual' ); ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="import_xml_manual">
        <?php wp_nonce_field( 'eafl_submit', 'eafl_submit' ); ?>
        <input type="hidden" name="eafl_link_nonce" value="<?php echo wp_create_nonce('link'); ?>" />
        <input type="file" name="xml">
        <?php submit_button( __( 'Import XML', 'easy-affiliate-links' ) ); ?>
    </form>
</div>