<?php

/**
 * User Topics Created
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_topics_created' ); ?>

	<div id="bbp-user-topics-started" class="bbp-user-topics-started bbp-user-profile panel panel-primary panel-bbpress">

		<div class="panel-heading">
			<?php _e( 'Forum Topics Started', 'my_theme-td' ); ?>
		</div>

		<div class="bbp-user-section">

			<?php if ( bbp_get_user_topics_started() ) : ?>

				<?php bbp_get_template_part( 'loop',       'topics' ); ?>

			<?php else : ?>

				<p><?php bbp_is_user_home() ? _e( 'You have not created any topics.', 'my_theme-td' ) : _e( 'This user has not created any topics.', 'my_theme-td' ); ?></p>

			<?php endif; ?>

		</div>
	</div><!-- #bbp-user-topics-started -->

	<?php do_action( 'bbp_template_after_user_topics_created' ); ?>
