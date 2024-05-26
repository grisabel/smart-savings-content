<?php if(is_active_sidebar('sidebar-1')){
	$newsstory_column = 8;
}else{
	$newsstory_column = 12;
} ?>
<div class="col-lg-<?php echo esc_attr($newsstory_column); ?>">
	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif; 

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content-list', get_post_type() );

		endwhile; 
		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div>
<?php if(is_active_sidebar('sidebar-1')): ?>
<div class="col-lg-4">
	<?php get_sidebar(); ?>
</div>
<?php endif; ?>