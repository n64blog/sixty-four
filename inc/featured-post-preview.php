<article class="card card--featured">
  <div class="card__image">
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('post-featured'); ?></a>
  </div>
  <div class="card__text">
    <ul>
      <li><?php the_category( ', ' ); ?></li>
      <li><?php the_time( 'j F Y' ); ?></li>
    </ul>
    <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
  </div>
</article>
