<article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h1 class="entry-title"><?php _e( 'Nothing Found', 'my_theme-td' ); ?></h1>
    </header>

    <div class="entry-content">
    <?php
        if( is_category() ) {
            $message = __('Sorry, no posts were found for this category.', 'my_theme-td');
        }
        else if( is_date() ) {
            $message = __('Sorry, no posts found in that timeframe', 'my_theme-td');
        }
        else if( is_author() ) {
            $message = __('Sorry, no posts from that author were found', 'my_theme-td');
        }
        else if( is_tag() ) {
            $message = sprintf( __('Sorry, no posts were tagged with  "%1$s"', 'my_theme-td'), single_tag_title( '', false ) );
        }
        else if( is_search() ) {
            $message = sprintf( __('Sorry, no search results were found for  "%1$s"', 'my_theme-td'), get_search_query() );
        }
        else {
            $message = __( 'Sorry, nothing found', 'my_theme-td' );
        }
    ?>
        <p><?php echo $message; ?></p>
    </div>
</article>