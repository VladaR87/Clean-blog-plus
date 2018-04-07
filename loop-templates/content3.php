<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header mt-4">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta mb-4">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
		if ( get_theme_mod( 'cbp-post-excerpt' ) == 'Yes' ) {
			the_excerpt();
		}
		?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'clean-blog-plus' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<hr>

</article><!-- #post-## -->