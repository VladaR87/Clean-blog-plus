<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package cbp
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php
$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
	$author_name ) : get_userdata( intval( $author ) );
?>

<header class="masthead" style="background-image: url('')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1><?php esc_html_e( 'About: ', 'clean-blog-plus' ); echo esc_html( $curauth->nickname ); ?></h1>
          <span class="subheading">  </span>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="wrapper" id="author-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<header class="page-header author-header">

					<?php if ( ! empty( $curauth->ID ) ) : ?>
						<?php echo get_avatar( $curauth->ID ); ?>
					<?php endif; ?>

					<dl>
						<?php if ( ! empty( $curauth->user_url ) ) : ?>
							<dt><?php esc_html_e( 'Website', 'clean-blog-plus' ); ?></dt>
							<dd>
								<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
							</dd>
						<?php endif; ?>

						<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<dt><?php esc_html_e( 'Profile', 'clean-blog-plus' ); ?></dt>
							<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
						<?php endif; ?>
					</dl>

					<h2><?php esc_html_e( 'Posts by', 'clean-blog-plus' ); ?> <?php echo esc_html( $curauth->nickname ); ?>
						:</h2>

				</header><!-- .page-header -->

				<div>

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
												
						<div class="post-preview">
							<a href="<?php the_permalink(); ?>">
							  <h2 class="post-title">
							    <?php the_title(); ?>
							  </h2>
							</a>	
							<p class="post-meta">Posted by <a href="#"><?php the_author(); ?></a> on <?php the_time( 'F d, Y' ); ?>
							</p>
							<?php the_excerpt(); ?>
						</div> 
						<hr>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

					<!-- End Loop -->

				</div>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php cbp_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
