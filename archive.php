<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixty_four
 */

get_header(); ?>

<div class="wrapper">
	<div class="grid">
		<div class="grid__col grid__col--8-of-12 grid__col--centered">
			<h1 class="page-title"><?php echo str_replace('Category: ','',get_the_archive_title()); ?></h1>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('inc/post', 'preview'); ?>
			<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>

			<?php get_template_part('inc/pagination'); ?>

		</div>
	</div>
</div>

<?php
get_footer();
