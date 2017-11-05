<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sixty_four
 */

get_header(); ?>

<div class="wrapper">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php endwhile; endif; ?>

</div>


<?php
get_footer();
