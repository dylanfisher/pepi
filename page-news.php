<?php the_post() ?>

<a href="<?php echo get_home_url(); ?>" rel="home" class="close-button single-post-close-button">&times;</a>

<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $args = array(
    'post_type' => array( 'news_item' ),
    'posts_per_page' => 12,
    'order' => 'desc',
    'paged' => $paged
  );

  $the_query = new WP_Query( $args );

  if ( $the_query->have_posts() ) :
    echo '<div class="news-items">';
      while ( $the_query->have_posts() ) : $the_query->the_post();
        get_template_part( 'partials/news_item' );
      endwhile;
    echo '</div>';
  endif;

  echo '<div class="pagination">';
    echo '<div class="pagination__left">';
      next_posts_link('Older', $the_query->max_num_pages);
    echo '</div>';
    echo '<div class="pagination__right">';
      previous_posts_link('Newer', $the_query->max_num_pages);
    echo '</div>';
  echo '</div>';

  wp_reset_postdata();
?>
