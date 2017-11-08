<?php $posts = get_field('related_posts'); ?>

<?php if( $posts ): ?>
  <section class="related-posts">
    <h2>Related</h2>
      <ul>
      <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>
          <li>
            <article class="related-post">
              <?php the_post_thumbnail('post-featured', array('class' => 'related-post__img')); ?>
              <a class="related-post__txt" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            </article>
          </li>
      <?php endforeach; ?>
      </ul>
  </section>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
