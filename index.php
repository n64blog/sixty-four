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
	$post_object_2 = get_field('featured_post_2', get_option('page_for_posts'));
	$post_object_3 = get_field('featured_post_3', get_option('page_for_posts'));
	$post_object_4 = get_field('featured_post_4', get_option('page_for_posts'));

	// Omit the featured post and paginate
	$wp_query = new WP_Query(array (
		'post__not_in' => array($post_object->ID,$post_object_2->ID,$post_object_3->ID,$post_object_4->ID),
		'paged' => $paged
	));

get_header(); ?>

<section class="carousel-container">
  <div class="center carousel">
		<!-- Featured 1 -->
		<?php if( $post_object ):

			// override $post
			$post = $post_object;
			setup_postdata( $post );

		?>
    <div>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php get_template_part('inc/featured-post', 'preview'); ?>
			</a>
    </div>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<!-- /Featured 1 -->

		<!-- Featured 2 -->
		<?php if( $post_object_2 ):

			// override $post
			$post = $post_object_2;
			setup_postdata( $post );

		?>
    <div>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php get_template_part('inc/featured-post', 'preview'); ?>
			</a>
    </div>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<!-- /Featured 2 -->

		<!-- Featured 3 -->
		<?php if( $post_object_3 ):

			// override $post
			$post = $post_object_3;
			setup_postdata( $post );

		?>
    <div>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php get_template_part('inc/featured-post', 'preview'); ?>
			</a>
    </div>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<!-- /Featured 3 -->

		<!-- Featured 4 -->
		<?php if( $post_object_4 ):

			// override $post
			$post = $post_object_4;
			setup_postdata( $post );

		?>
    <div>
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php get_template_part('inc/featured-post', 'preview'); ?>
			</a>
    </div>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<!-- /Featured 4 -->

  </div>
</section>




	<div class="wrapper">

		<!-- Main Post Loop -->
		<main class="main">
			<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<?php get_template_part('inc/post', 'preview'); ?>
			<?php endwhile; else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<?php get_template_part('inc/pagination'); ?>
		</main>
		<!-- /Main Post Loop -->

		<!-- Sidebar content -->
		<aside class="sidebar">

			<?php dynamic_sidebar( 'sidebar-2' ); ?>

			<a href="/2017/05/22/n64-hori-mini-pad-review">
				<div class="evergreen-content">
					<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/hori.svg" alt="">
					<h2>N64 Hori Mini Pad review</h2>
				</div>
			</a>

			<a href="2017/01/29/everdrive-64-guide">
				<div class="evergreen-content">
					<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/images/everdrive.svg" alt="">
					<h2>EverDrive 64 guide</h2>
				</div>
			</a>

		</aside>
		<!-- /Sidebar content -->

	</div>

	<script type="text/javascript">
		jQuery('.carousel').slick({
		  arrows: true,
		  centerMode: true,
		  centerPadding: '0px',
		  slidesToShow: 3,
		    responsive: [
		    {
		      breakpoint: 960,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        slidesToShow: 1
		      }
		    }
		  ]
		});
  </script>

<?php
get_footer();
