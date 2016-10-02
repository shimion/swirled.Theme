<?php
/**
 * BuddyPress - Blogs
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
/**
 * Fires at the top of the blogs directory template file.
 *
 * @since 2.3.0
 */
do_action( 'bp_before_directory_blogs_page' );
?>

<?php do_action( 'bp_before_directory_blogs' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_before_directory_blogs_content' ); ?>

	<div id="blog-dir-search" class="dir-search boss-search-wrapper" role="search">
		<?php bp_directory_blogs_search_form(); ?>
	</div><!-- #blog-dir-search -->

	<form action="" method="post" id="blogs-directory-form" class="dir-form">

		<div id="subnav" class="item-list-tabs" role="navigation">
			<ul>
				<li class="selected" id="blogs-all"><a href="<?php bp_root_domain(); ?>/<?php bp_blogs_root_slug(); ?>"><?php printf( __( 'All Sites <span>%s</span>', 'onesocial' ), bp_get_total_blog_count() ); ?></a></li>

				<?php if ( is_user_logged_in() && bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ) : ?>

					<li id="blogs-personal"><a href="<?php echo bp_loggedin_user_domain() . bp_get_blogs_slug(); ?>"><?php printf( __( 'My Sites <span>%s</span>', 'onesocial' ), bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

				<?php endif; ?>

				<?php do_action( 'bp_blogs_directory_blog_types' ); ?>

				<?php do_action( 'bp_blogs_directory_blog_sub_types' ); ?>

				<li id="blogs-order-select" class="last filter">

					<label for="blogs-order-by"><?php _e( 'Order By:', 'onesocial' ); ?></label>
					<select id="blogs-order-by">
						<option value="active"><?php _e( 'Last Active', 'onesocial' ); ?></option>
						<option value="newest"><?php _e( 'Newest', 'onesocial' ); ?></option>
						<option value="alphabetical"><?php _e( 'Alphabetical', 'onesocial' ); ?></option>

						<?php do_action( 'bp_blogs_directory_order_options' ); ?>

					</select>
				</li>

			</ul>
		</div><!-- .item-list-tabs -->

		<div id="blogs-dir-list" class="blogs dir-list">

			<?php bp_get_template_part( 'blogs/blogs-loop' ); ?>

		</div><!-- #blogs-dir-list -->

		<?php do_action( 'bp_directory_blogs_content' ); ?>

		<?php wp_nonce_field( 'directory_blogs', '_wpnonce-blogs-filter' ); ?>

		<?php do_action( 'bp_after_directory_blogs_content' ); ?>

	</form><!-- #blogs-directory-form -->

	<?php do_action( 'bp_after_directory_blogs' ); ?>

</div>