<?php

/**
 * New/Edit Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( !bbp_is_single_forum() ) : ?>

<div id="bbpress-forums">

	<?php do_action( 'pm-bbpress-global-top' ); ?>

<?php endif; ?>

<?php if ( bbp_is_topic_edit() ) : ?>

	<?php bbp_topic_tag_list( bbp_get_topic_id() ); ?>

<?php endif; ?>

<?php if ( bbp_current_user_can_access_create_topic_form() ) : ?>

	<div id="new-topic-<?php bbp_topic_id(); ?>" class="panel panel-primary panel-bbpress bbp-topic-form">

		<div class="panel-heading">
				<?php
					if ( bbp_is_topic_edit() )
						printf( __( 'Now Editing &ldquo;%s&rdquo;', 'my_theme-td' ), bbp_get_topic_title() );
					else
						bbp_is_single_forum() ? printf( __( 'Create New Topic in &ldquo;%s&rdquo;', 'my_theme-td' ), bbp_get_forum_title() ) : _e( 'Create New Topic', 'my_theme-td' );
				?>
		</div>

		<form id="new-post" name="new-post" method="post" action="<?php the_permalink(); ?>">
			<div class="panel-body">
				<?php do_action( 'bbp_theme_before_topic_form' ); ?>

				<fieldset class="bbp-form">

					<?php do_action( 'bbp_theme_before_topic_form_notices' ); ?>

					<?php if ( !bbp_is_topic_edit() && bbp_is_forum_closed() ) : ?>

						<div class="panel-warning">
							<p><?php _e( 'This forum is marked as closed to new topics, however your posting capabilities still allow you to do so.', 'my_theme-td' ); ?></p>
						</div>

					<?php endif; ?>

					<?php if ( current_user_can( 'unfiltered_html' ) ) : ?>

						<div class="panel-warning">
							<p><?php _e( 'Your account has the ability to post unrestricted HTML content.', 'my_theme-td' ); ?></p>
						</div>

					<?php endif; ?>

					<?php do_action( 'bbp_template_notices' ); ?>

					<div>

						<?php bbp_get_template_part( 'form', 'anonymous' ); ?>

						<?php do_action( 'bbp_theme_before_topic_form_title' ); ?>

						<div class="form-group">
							<label for="bbp_topic_title"><?php printf( __( 'Topic Title (Maximum Length: %d):', 'my_theme-td' ), bbp_get_title_max_length() ); ?></label><br />
							<input class="form-control" type="text" id="bbp_topic_title" value="<?php bbp_form_topic_title(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_title" maxlength="<?php bbp_title_max_length(); ?>" />
						</div>

						<?php do_action( 'bbp_theme_after_topic_form_title' ); ?>

						<?php do_action( 'bbp_theme_before_topic_form_content' ); ?>

						<?php bbp_the_content( array( 'context' => 'topic' ) ); ?>

						<?php do_action( 'bbp_theme_after_topic_form_content' ); ?>

						<?php if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) ) : ?>

							<div class="form-group form-allowed-tags">
								<label><?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:','my_theme-td' ); ?></label><br />
								<code><?php bbp_allowed_tags(); ?></code>
							</div>

						<?php endif; ?>

						<?php if ( bbp_allow_topic_tags() && current_user_can( 'assign_topic_tags' ) ) : ?>

							<?php do_action( 'bbp_theme_before_topic_form_tags' ); ?>

							<div class="form-group">
								<label for="bbp_topic_tags"><?php _e( 'Topic Tags:', 'my_theme-td' ); ?></label><br />
								<input class="form-control" type="text" value="<?php bbp_form_topic_tags(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_tags" id="bbp_topic_tags" <?php disabled( bbp_is_topic_spam() ); ?> />
							</div>

							<?php do_action( 'bbp_theme_after_topic_form_tags' ); ?>

						<?php endif; ?>

						<?php if ( !bbp_is_single_forum() ) : ?>

							<?php do_action( 'bbp_theme_before_topic_form_forum' ); ?>

							<div class="form-group">
								<label for="bbp_forum_id"><?php _e( 'Forum:', 'my_theme-td' ); ?></label><br />
								<?php
									bbp_dropdown( array(
										'show_none' => __( '(No Forum)', 'my_theme-td' ),
										'selected'  => bbp_get_form_topic_forum()
									) );
								?>
							</div>

							<?php do_action( 'bbp_theme_after_topic_form_forum' ); ?>

						<?php endif; ?>

						<?php if ( current_user_can( 'moderate' ) ) : ?>

							<?php do_action( 'bbp_theme_before_topic_form_type' ); ?>

							<div class="form-group">

								<label for="bbp_stick_topic"><?php _e( 'Topic Type:', 'my_theme-td' ); ?></label><br />

								<?php bbp_form_topic_type_dropdown(); ?>

							</div>

							<?php do_action( 'bbp_theme_after_topic_form_type' ); ?>

							<?php do_action( 'bbp_theme_before_topic_form_status' ); ?>

							<div class="form-group">

								<label for="bbp_topic_status"><?php _e( 'Topic Status:', 'my_theme-td' ); ?></label><br />

								<?php bbp_form_topic_status_dropdown(); ?>

							</div>

							<?php do_action( 'bbp_theme_after_topic_form_status' ); ?>

						<?php endif; ?>

						<?php if ( bbp_is_subscriptions_active() && !bbp_is_anonymous() && ( !bbp_is_topic_edit() || ( bbp_is_topic_edit() && !bbp_is_topic_anonymous() ) ) ) : ?>

							<?php do_action( 'bbp_theme_before_topic_form_subscriptions' ); ?>

							<div class="checkbox">
								<label for="bbp_topic_subscription">
								<?php if ( bbp_is_topic_edit() && ( bbp_get_topic_author_id() !== bbp_get_current_user_id() ) ) : ?>

									<?php _e( 'Notify the author of follow-up replies via email', 'my_theme-td' ); ?>

								<?php else : ?>

									<?php _e( 'Notify me of follow-up replies via email', 'my_theme-td' ); ?>

								<?php endif; ?>

								<input name="bbp_topic_subscription" id="bbp_topic_subscription" type="checkbox" value="bbp_subscribe" <?php bbp_form_topic_subscribed(); ?> tabindex="<?php bbp_tab_index(); ?>" />
								</label>
							</div>

							<?php do_action( 'bbp_theme_after_topic_form_subscriptions' ); ?>

						<?php endif; ?>

						<?php if ( bbp_allow_revisions() && bbp_is_topic_edit() ) : ?>

							<?php do_action( 'bbp_theme_before_topic_form_revisions' ); ?>

							<fieldset class="bbp-form">
								<div class="checkbox">
									<input name="bbp_log_topic_edit" id="bbp_log_topic_edit" type="checkbox" value="1" <?php bbp_form_topic_log_edit(); ?> tabindex="<?php bbp_tab_index(); ?>" />
									<label for="bbp_log_topic_edit"><?php _e( 'Keep a log of this edit:', 'my_theme-td' ); ?></label><br />
								</div>

								<div>
									<label for="bbp_topic_edit_reason"><?php printf( __( 'Optional reason for editing:', 'my_theme-td' ), bbp_get_current_user_name() ); ?></label><br />
									<input type="text" value="<?php bbp_form_topic_edit_reason(); ?>" tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_edit_reason" id="bbp_topic_edit_reason" />
								</div>
							</fieldset>

							<?php do_action( 'bbp_theme_after_topic_form_revisions' ); ?>

						<?php endif; ?>

					</div>

					<?php bbp_topic_form_fields(); ?>

				</fieldset>

				<?php do_action( 'bbp_theme_after_topic_form' ); ?>
			</div>

			<div class="panel-footer">
				<?php do_action( 'bbp_theme_before_topic_form_submit_wrapper' ); ?>

				<div class="bbp-submit-wrapper">

					<?php do_action( 'bbp_theme_before_topic_form_submit_button' ); ?>

					<button type="submit" tabindex="<?php bbp_tab_index(); ?>" id="bbp_topic_submit" name="bbp_topic_submit" class="btn btn-primary submit"><?php _e( 'Submit', 'my_theme-td' ); ?></button>

					<?php do_action( 'bbp_theme_after_topic_form_submit_button' ); ?>

				</div>

				<?php do_action( 'bbp_theme_after_topic_form_submit_wrapper' ); ?>

			</div>

		</form>
	</div>

<?php elseif ( bbp_is_forum_closed() ) : ?>

	<div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
		<div class="alert /wp-content/themes/my-company/bbpress
alert-warning clear">
			<p><?php printf( __( 'The forum &#8216;%s&#8217; is closed to new topics and replies.', 'my_theme-td' ), bbp_get_forum_title() ); ?></p>
		</div>
	</div>

<?php else : ?>

	<div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
		<div class="alert /wp-content/themes/my-company/bbpress
alert-warning clear">
			<p><?php is_user_logged_in() ? _e( 'You cannot create new topics.', 'my_theme-td' ) : _e( 'You must be logged in to create new topics.', 'my_theme-td' ); ?></p>
		</div>
	</div>

<?php endif; ?>

<?php if ( !bbp_is_single_forum() ) : ?>

	<?php do_action( 'pm-bbpress-global-bottom' ); ?>

</div>

<?php endif; ?>
