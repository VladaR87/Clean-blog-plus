<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cbp
 */

$container = get_theme_mod( 'understrap_container_type' );
?>

<hr>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer>

					<!-- Footer widget area -->
					<div class="row footer-widgets">
						<div class="col-md-4">
							<?php if (is_active_sidebar( 'footer-left' )) {
								dynamic_sidebar( 'footer-left' );	
							} ?>
						</div>
						<div class="col-md-4">
							<?php if (is_active_sidebar( 'footer-center' )) {
								dynamic_sidebar( 'footer-center' );	
							} ?>
						</div>
						<div class="col-md-4">
							<?php if (is_active_sidebar( 'footer-right' )) {
								dynamic_sidebar( 'footer-right' );	
							} ?>
						</div>
					</div>

					<!-- Social icons -->
					<div class="container">
					  <div class="row">
					    <div class="col-lg-8 col-md-10 mx-auto">
					      
					      <?php get_template_part( 'global-templates/footer-social' ); ?>

					      <p class="copyright text-muted">

					      	<?php if (!get_theme_mod( 'cbp-footer-text')): ?>
					      		<a href="<?php  echo esc_url( __( 'http://wordpress.org/','clean-blog-plus' ) ); ?>"><?php printf( 
					      		/* translators:*/
					      		esc_html__( 'Proudly powered by %s', 'clean-blog-plus' ),'WordPress' ); ?></a>
					      			<span class="sep"> | </span>
					      		
					      		<?php printf( // WPCS: XSS ok.
					      		/* translators:*/
					      			esc_html__( 'Theme: %1$s by %2$s.', 'clean-blog-plus' ), 'Clean Blog Plus',  '<a href="'.esc_url( __('pogledajsajt.byethost32.com', 'clean-blog-plus')).'">Vlad</a>' ); ?> 
					      	<?php else: ?>
					      		<?php echo get_theme_mod( 'cbp-footer-text'); ?>
					      	<?php endif ?>
					     
					      </p><!-- .site-info -->
					    </div>
					  </div>
					</div>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

