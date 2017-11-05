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

<main class="wrapper">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="page-title"><?php the_title(); ?></h1>

	<div class="grid">
		<div class="grid__col grid__col--8-of-12">
			<div class="post-content">
				<?php the_post_thumbnail('post-featured', array('class' => 'featured-img')); ?>
				<?php the_content(); ?>
			</div>
		</div>

		<div class="grid__col grid__col--4-of-12">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php endwhile; endif; ?>

</main>

<?php
get_sidebar();
get_footer();
