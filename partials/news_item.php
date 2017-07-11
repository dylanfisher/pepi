<div class="news-item">
  <div class="link-set__item">
    <h2 class="link-set__item__title">
      <?php the_title(); ?>
    </h2>
    <div class="link-set__item__label">
      <?php echo get_the_date( 'm.d.y' ); ?>
    </div>
  </div>

  <?php sandbox_image(); ?>

  <div class="entry-content">
    <?php the_field( 'content' ); ?>
  </div>
</div>
