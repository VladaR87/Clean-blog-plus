<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cbp
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url( <?php echo wp_get_attachment_url( get_theme_mod( 'cbp-header-image' ) );  ?> )">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1><?php bloginfo( 'name' ); ?></h1>
          <span class="subheading"><?php bloginfo( 'description' ); ?></span>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<!-- Check the chosen image position -->
			<?php if( !get_theme_mod( 'cbp-post-image-position' ) || get_theme_mod( 'cbp-post-image-position' ) == 'Left' ) {
				$template = 'content';
			} elseif ( get_theme_mod( 'cbp-post-image-position' ) == 'Center' ) {
				$template = 'content2';
			} elseif ( get_theme_mod( 'cbp-post-image-position' ) == 'None' ) {
				$template = 'content3';
			} ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( "loop-templates/$template", get_post_format() );
						
					endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php cbp_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
