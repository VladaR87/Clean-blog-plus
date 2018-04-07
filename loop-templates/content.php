<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package cbp
 */
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( get_theme_mod( 'understrap_sidebar_position' ) == 'none' ) : ?>
		<div class="col-lg-10 col-md-10 mx-auto">
	<?php else: ?>
		<div class="col-lg-12 col-md-12">
	<?php endif; ?>
		<?php if ( has_post_thumbnail() ) : ?>
		  <div class="row post-preview">
			<div class="col-md-4">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
			<div class="col-md-8">
				<a href="<?php the_permalink(); ?>">
				  <h2 class="post-title">
				    <?php the_title(); ?>
				  </h2>
				</a>
				<p class="post-meta">Posted by <a href="#"><?php the_author(); ?></a> on <?php the_time( 'F d, Y' ); ?></p>
			</div>	
			<?php if ( !get_theme_mod( 'cbp-post-excerpt' ) || get_theme_mod( 'cbp-post-excerpt' ) == 'Yes' ): ?>
				<div class="col-md-12">
					<?php the_excerpt(); ?>
				</div>
			<?php endif ?>
		  </div>
		  <hr>
		<?php else : ?> 
		  <div class="post-preview">		
			<a href="<?php the_permalink(); ?>">
			  <h2 class="post-title">
			    <?php the_title(); ?>
			  </h2>
			</a>
			<p class="post-meta">
				Posted by <a href="#"><?php the_author(); ?></a> on <?php the_time( 'F d, Y' ); ?>
			</p>
			<?php if ( !get_theme_mod( 'cbp-post-excerpt' ) || get_theme_mod( 'cbp-post-excerpt' ) == 'Yes' ) {
    			the_excerpt();
			} ?>
		  </div> 
		  <hr>
		<?php endif; ?>
	</div>

</article><!-- #post-## -->
