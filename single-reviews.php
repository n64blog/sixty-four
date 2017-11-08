<?php
/**
 * Template Name: Review
 * Template Post Type: post, page, product
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sixty_four
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="wrapper">

	<h1 class="page-title"><?php the_title(); ?></h1>
	<p class="page-byline">by <?php the_author(); ?>, <?php the_date('j F Y') ?></p>

	<div class="grid">
		<div class="grid__col grid__col--8-of-12">
			<div class="post-content">
				<?php the_post_thumbnail('post-featured', array('class' => 'featured-img')); ?>
				<?php the_content(); ?>
			</div>
		</div>

		<div class="grid__col grid__col--4-of-12">
			<!-- Game meta -->
			<?php get_template_part('inc/game', 'meta'); ?>
			<!--/ Game meta -->

			<!-- Related Posts -->
			<?php get_template_part('inc/related-posts'); ?>
			<!--/ Related Posts -->
		</div>
	</div>

</div>

<?php get_template_part('inc/game', 'score'); ?>

<?php endwhile; endif; ?>


<?php
get_footer();
