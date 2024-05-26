<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsstory
 */
if ( ! is_singular( ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="list-post d-flex align-items-center">
		<div class="list-post-content">
			<div class="single-blog">
				<div class="newsstory-btn">
					<?php newsstory_entry_category(); ?>
				</div>
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif; ?>
				</header><!-- .entry-header -->
				<?php
				if ( 'post' === get_post_type() ) : ?>
					<ul class="post-meta">
						<li><?php newsstory_posted_by(); ?></li>
						<li><?php newsstory_posted_on(); ?></li>
						<li><?php newsstory_entry_comments(); ?></li>
					</ul><!-- .entry-meta -->
				<?php endif; ?>
			</div>
		</div>
		<?php if ( has_post_thumbnail () ): ?>
		<div class="list-post-img">
			<div class="img-box">
				<?php newsstory_post_thumbnail(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</article>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="newsstory-btn">
		<?php newsstory_entry_category(); ?>
	</div>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->
	<?php
	if ( 'post' === get_post_type() ) : ?>
		<ul class="post-meta">
			<li><?php newsstory_posted_by(); ?></li>
			<li><?php newsstory_posted_on(); ?></li>
			<li><?php newsstory_entry_comments(); ?></li>
		</ul><!-- .entry-meta -->
	<?php endif; ?>

	<?php if ( has_post_thumbnail () ): ?>
	<div class="post-thumbnail">
		<?php newsstory_post_thumbnail(); ?>
	</div>
	<?php endif; ?>
	<div class="post-content">
		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'newsstory' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsstory' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php newsstory_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article>
<?php endif; ?>