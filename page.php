<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
		<main class="main gutenberg">
			<?php the_post_thumbnail('post-featured', array('class' => 'featured-img')); ?>
			<?php the_content(); ?>
		</main>
		<aside class="sidebar">
			<?php get_sidebar(); ?>
		</aside>
	</div>

<?php endwhile; endif; ?>

<?php
get_footer();
