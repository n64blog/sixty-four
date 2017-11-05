<article class="post-preview">
  <div class="post-preview__img">
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('post-featured'); ?></a>
  </div>
  <div class="post-preview__txt">
    <ul>
      <li><?php the_category( ', ' ); ?></li>
      <li><?php the_time( 'j F Y' ); ?></li>
    </ul>
    <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
  </div>
</article>
