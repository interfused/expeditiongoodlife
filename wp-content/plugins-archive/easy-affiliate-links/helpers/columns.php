<?php

class EAFL_Columns {

    public function __construct()
    {
        add_filter( 'manage_edit-easy_affiliate_link_columns', array( $this, 'columns') );
        add_filter( 'manage_easy_affiliate_link_posts_custom_column' , array( $this, 'columns_content'), 10, 2 );
        add_filter( 'manage_easy_affiliate_link_posts_columns' , array( $this, 'columns_order' ) );
    }

    public function columns( $columns ) {
        $columns['eafl_shortlink'] = __( 'Link', 'easy-affiliate-links' );
        $columns['eafl_clicks'] = __( 'Clicks', 'easy-affiliate-links' );
//        $columns['eafl_options'] = __( 'Target - Redirect - Nofollow', 'easy-affiliate-links' );

        return $columns;
    }

    public function columns_content( $column, $post_ID ) {
        $link = new EAFL_Link( $post_ID );

        switch( $column ) {
            case 'eafl_shortlink':
				$text = $link->text();
                if( EasyAffiliateLinks::option( 'admin_link_column', 'shortlink' ) == 'shortlink' ) {
                    echo '<span class="eafl_shortlink">' . site_url( '/' . EasyAffiliateLinks::option( 'link_slug', 'recommends' ) . '/' . $link->slug() ) . '</span>';
                } else {
                    echo '<span class="eafl_shortlink">' . $link->url() .  '</span>';
                }

                break;

            case 'eafl_clicks':
                $summary = EasyAffiliateLinks::get()->helper( 'clicks' )->summary( $link->ID() );
                $reset = $summary['all'] > 0 ? ' (<a href="#" onclick="event.preventDefault(); EasyAffiliateLinks.resetClicks('. $post_ID.');">' . __( 'reset', 'easy-affiliate-links' ) . '</a>)' : '';

                echo '<span class="eafl_clicks">' . $summary['month'] . '</span> <span class="eafl_clicks_label">' . __( 'This month', 'easy-affiliate-links' ) . '</span><br/>';
                echo '<span class="eafl_clicks_lifetime">' . $summary['all'] . '</span> <span class="eafl_clicks_label">' . __( 'Lifetime', 'easy-affiliate-links' ) . $reset . '</span>';
                break;

            case 'eafl_options':
                $target = $link->target( true );
                if( $target == '_self' ) $target = 'self';
                if( $target == '_blank' ) $target = 'new';
                echo $target;

                echo ' - ';

                $redirect_type = $link->redirect_type( true );
                echo $redirect_type == 999 ? 'default' : $redirect_type;

                echo ' - ';

                echo $link->nofollow( true );
                break;
        }
    }

    public function columns_order( $columns ) {
        $reordered = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Name', 'easy-affiliate-links' ),
            'eafl_shortlink' => __( 'Link', 'easy-affiliate-links' ),
            'eafl_clicks' => __( 'Clicks', 'easy-affiliate-links' ),
//            'eafl_options' => __( 'Target - Redirect - Nofollow', 'easy-affiliate-links' ),
            'taxonomy-eafl_category' => __( 'Link Categories', 'easy-affiliate-links' ),
            'date' => __( 'Date', 'easy-affiliate-links' ),
        );

        return $reordered;
    }
}