<ul class="pagination">
  <?php if( get_previous_posts_link() ) : ?>
    <li class="pagination__previous"><?php previous_posts_link( 'Previous page' ); ?></li>
  <?php endif; ?>
  <?php if( get_next_posts_link() ) : ?>
    <li class="pagination__next"><?php next_posts_link( 'Next page' ); ?></li>
  <?php endif; ?>
</ul>
