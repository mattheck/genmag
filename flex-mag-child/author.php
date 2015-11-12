<?php get_header(); ?>
<?php global $author; $userdata = get_userdata($author); ?>
<div id="home-main-wrap" class="left relative">
	<div class="home-wrap-out1">
		<div class="home-wrap-in1">
			<div id="home-left-wrap" class="left relative">
				<div id="home-left-col" class="relative">
					<div id="home-mid-wrap" class="left relative">
						<?php
							$author = get_queried_object();
							$authorid = $author->ID;
							echo do_shortcode( '[up_author_profile themes="flat" id="'.$authorid.'"]' ); 
						?>
					</div><!--home-mid-wrap-->
				</div><!--home-left-col-->
			</div><!--home-left-wrap-->
		</div><!--home-wrap-in1-->
		<div id="arch-right-col" class="relative">
			<?php get_sidebar(); ?>
		</div><!--home-right-col-->
	</div><!--home-wrap-out1-->
</div><!--home-main-wrap-->
<?php get_footer(); ?>