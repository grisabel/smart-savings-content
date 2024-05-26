<?php
/**
 * Footer action
 * @package Newsstory
 */

function newsstory_footer_style_1(){ ?>
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright text-center">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'newsstory' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'newsstory' ), 'WordPress' );
						?>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php }
add_action('newsstory_footer_style','newsstory_footer_style_1');