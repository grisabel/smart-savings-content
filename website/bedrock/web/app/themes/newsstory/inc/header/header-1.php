<?php
/**
 * Header action
 * @package Newsstory
 */
function newsstory_header_style_1(){ ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newsstory' ); ?></a>
	<header id="masthead" class="header-area <?php if(has_header_image() && is_front_page()): ?>newsstory-header-img<?php endif; ?>">
		<?php if(has_header_image() && is_front_page()): ?>
	        <div class="header-img"> 
	        	<?php the_header_image_tag(); ?>
	        </div>
        <?php endif; ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="site-branding text-left">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$newsstory_description = get_bloginfo( 'description', 'display' );
						if ( $newsstory_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo esc_html($newsstory_description); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social">
						<?php
						$fb_url = get_theme_mod('fb_url');
						$tw_url = get_theme_mod('tw_url');
						$link_url = get_theme_mod('link_url');
						$instagram_url = get_theme_mod('instagram_url');
						?>
	                    <li><a href="<?php echo esc_url($fb_url); ?>"><i class="fa fa-facebook-f"></i></a></li>
	                    <li><a href="<?php echo esc_url($tw_url); ?>"><i class="fa fa-twitter"></i></a></li>
	                    <li><a href="<?php echo esc_url($link_url); ?>"><i class="fa fa-linkedin"></i></a></li>
	                    <li><a href="<?php echo esc_url($instagram_url); ?>"><i class="fa fa-instagram"></i></a></li>
	                </ul>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<section class="mainmenu-area text-center">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="newsstory-responsive-menu"></div>
					<button class="screen-reader-text menu-close"><?php esc_html_e( 'Close Menu', 'newsstory' ); ?></button>
					<div class="mainmenu">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }
add_action('newsstory_header_style','newsstory_header_style_1');