<?php

/**
 * User Subscriptions
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_subscriptions' ); ?>

	<?php if ( bbp_is_subscriptions_active() ) : ?>

		<?php if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ) : ?>

			<div id="bbp-user-subscriptions" class="bbp-user-subscriptions panel panel-primary panel-bbpress">
				<div class="panel-heading">
					<?php _e( 'Subscribed Forums', 'my_theme-td' ); ?>
				</div>

				<div class="bbp-user-section">

					<?php if ( bbp_get_user_forum_subscriptions() ) : ?>

						<?php bbp_get_template_part( 'loop', 'forums' ); ?>

					<?php else : ?>

						<p><?php bbp_is_user_home() ? _e( 'You are not currently subscribed to any forums.', 'my_theme-td' ) : _e( 'This user is not currently subscribed to any forums.', 'my_theme-td' ); ?></p>

					<?php endif; ?>

				</div>
			</div>

			<div class="panel panel-primary panel-bbpress">

				<div class="panel-heading">
					<?php _e( 'Subscribed Topics', 'my_theme-td' ); ?>
				</div>

				<div class="bbp-user-section">

					<?php if ( bbp_get_user_topic_subscriptions() ) : ?>

						<?php bbp_get_template_part( 'loop',       'topics' ); ?>

					<?php else : ?>

						<p><?php bbp_is_user_home() ? _e( 'You are not currently subscribed to any topics.', 'my_theme-td' ) : _e( 'This user is not currently subscribed to any topics.', 'my_theme-td' ); ?></p>

					<?php endif; ?>

				</div>

			</div><!-- #bbp-user-subscriptions -->

		<?php endif; ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_user_subscriptions' ); ?>
