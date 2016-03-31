<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<div class="container upper-footer">
					<div class="et_pb_gutters3 et_pb_footer_columns2">
						<div class="footer-widget">
							<?php dynamic_sidebar('upper-footer-sidebar-1'); ?>
						</div>
						<div class="footer-widget">
							<?php dynamic_sidebar('upper-footer-sidebar-2'); ?>
						</div>
					</div>
				</div>
				<div class="lower-footer">
					<?php get_sidebar( 'footer' ); ?>
				</div>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}
				?>

						<p id="footer-info">
							 Brightworks Sustainability, LLC. : &copy; 2001-<?php echo date('Y'); ?>
							<?php //printf( __( 'Designed by %1$s | Powered by %2$s', 'Divi' ), '<a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant Themes</a>', '<a href="http://www.wordpress.org">WordPress</a>' ); ?></p>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

			

	</div> <!-- #page-container -->
			</div> <!-- #pure drawer closing elements - Started in header.php  -->
		</div> <label class="pure-overlay" for="pure-toggle-top" data-overlay="top"></label> 
	</div>

	<?php wp_footer(); ?>
	
			
</body>
</html>