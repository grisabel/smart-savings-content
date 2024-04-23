<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsstory 
 */
$newsstory_style_settings      = get_theme_mod('newsstory_style_settings','false'); 
if( $newsstory_style_settings == 'false'){
    $newsstory_style_settings ='1';
}else{
    $newsstory_style_settings ='2';
}
get_header();
?>
<section class="news-area <?php if( ! is_active_sidebar('sidebar-1')): ?>block-content-css<?php endif; ?>" id="content">
	<div class="container-fluid">
		<div class="easy-tricker-content">
			<div class="row">
				<div class="col-lg-2">
					<div class="news-text">
	                    <h2><?php esc_html_e('Latest News','newsstory'); ?></h2>
	                </div>
				</div>
				<div class="col-lg-10">
					<div class="news-content">
	                    <div class="news">
	                        <ul>
		                        <?php  if ( have_posts() ) :
		                        while(have_posts()) : the_post(); ?>
		                            <li>
		                                <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a>
		                            </li>
		                        <?php endwhile;  endif; ?>
	                        </ul>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog-area padding-top <?php if( ! is_active_sidebar('sidebar-1')): ?>block-content-css<?php endif; ?>">
	<div class="container-fluid">
		<div class="row">
			<?php get_template_part( 'template-parts/blog/blog-'.esc_html( $newsstory_style_settings ).'' ); ?>
		</div>
	</div>
</section>
<?php
get_footer();
