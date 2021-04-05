<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sixty_four
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="wrapper post">
		<header class="post__header">
			<h1><?php the_title(); ?></h1>
			<p>by <?php the_author(); ?>, <?php the_date('j F Y') ?></p>
		</header>
		<main class="main post__content gutenberg">
			<?php the_post_thumbnail('post-featured', array('class' => 'featured-img')); ?>
			<?php the_content(); ?>
		</main>
		<aside class="sidebar post__sidebar">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>

			<?php get_template_part('inc/related-posts'); ?>
		</aside>
	</div>

<?php endwhile; endif; ?>

<?php
get_footer();
