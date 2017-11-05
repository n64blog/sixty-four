<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixty_four
 */

	// Fix pagination
	if ( get_query_var('paged') ) {
	   $paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
	   $paged = get_query_var('page');
	} else {
	   $paged = 1;
	}

	// Get featured post custom field
	$post_object = get_field('featured_post', get_option('page_for_posts'));

	// Omit the featured post and paginate
	$wp_query = new WP_Query(array (
		'post__not_in' => array($post_object->ID),
		'paged' => $paged
	));

get_header(); ?>

<div class="wrapper">
	<div class="grid">

		<!-- Featured Post -->

		<?php

		if( $post_object ):

			// override $post
			$post = $post_object;
			setup_postdata( $post );

			?>
			<div class="grid__col grid__col--12-of-12 grid__col--centered">
			  <a href="<?php the_permalink(); ?>" rel="bookmark">
			    <section class="hero">
			      <div class="hero__img">
			        <?php the_post_thumbnail('post-featured-hero'); ?>
			      </div>
			      <div class="hero__txt">
			        <h2><?php the_title(); ?></h2>
			      </div>
			    </section>
			  </a>
			</div>
		    <?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<!-- Featured Post -->

		<!-- Main Post Loop -->

		<div class="grid__col grid__col--8-of-12 grid__col--centered">

			<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			  <?php get_template_part('inc/post', 'preview'); ?>
			<?php endwhile; else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

			<?php get_template_part('inc/pagination'); ?>

		</div>

		<!-- Main Post Loop -->

	</div>
</div>

<?php
get_footer();
