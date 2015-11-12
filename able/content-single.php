<?php
/**
 * @package Able
 * @since Able 1.0
 */
?>

<?php echo do_shortcode('[rev_slider alias="home"]'); ?>
<div style="text-align:center; margin-top: 12px; margin-bottom: 5px;"><a href="http://dev.burtoniagroup.com/fitblog/measure-blood-pressure-at-home/"><img style="width: 50%;" src="http://dev.burtoniagroup.com/fitblog/wp-content/uploads/2015/09/banner-1.jpg"/></a><a href="#"><img style="width: 50%;" src="http://dev.burtoniagroup.com/fitblog/wp-content/uploads/2015/09/banner-2.jpg" /></a></div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php able_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'able' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'able' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! able_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'able' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'able' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'able' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'able' );
				}

			} // end check for categories on this blog

			
		?>

		<?php edit_post_link( __( 'Edit', 'able' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->