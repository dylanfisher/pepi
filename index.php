<?php the_post() ?>

<ul class="link-set">
  <li class="link-set__item link-set__item--primary">
    <span class="link-set__item__title">
      <?php bloginfo('name'); ?>
    </span>
    <span class="link-set__item__label">
      <?php echo date( 'Y' ); ?>
    </span>
  </li>

  <?php if ( have_rows( 'link_set', 'option' ) ): ?>
    <?php while ( have_rows( 'link_set', 'option' ) ): the_row(); ?>
      <li class="link-set__item">
        <a href="<?php the_sub_field( 'link' ); ?>" class="blank-link" target="_blank">
          <span class="link-set__item__title">
            <?php the_sub_field( 'title' ); ?>
          </span>
          <span class="link-set__item__label">
            <?php the_sub_field( 'label' ); ?>
          </span>
        </a>
        <div class="link-set__media">
          <?php $images = get_sub_field( 'images', 'option' ); ?>
          <?php if ( $images ): ?>
            <?php foreach ( $images as $image ): ?>
              <img src="<?php echo $image['sizes']['large']; ?>">
            <?php endforeach; ?>
          <?php endif; ?>

          <?php if ( have_rows( 'videos', 'option' ) ): ?>
            <?php while ( have_rows( 'videos', 'option' ) ): the_row(); ?>
              <div class="video-item" data-src="<?php echo get_sub_field( 'video_url' ); ?>"></div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </li>
    <?php endwhile; ?>
  <?php endif; ?>

  <li class="link-set__item link-set__item--contact <?php echo get_field( 'contact_link_label', 'option' ) ? '' : 'link-set__item--single'; ?>">
    <span class="link-set__item__title">
      <?php the_field( 'contact_link_title', 'option' ); ?>
    </span>
    <?php if ( get_field( 'contact_link_label', 'option' ) ): ?>
      <span class="link-set__item__label">
        <?php the_field( 'contact_link_label', 'option' ); ?>
      </span>
    <?php endif; ?>
    <div class="contact-info">
      <div class="contact-info__close">
        <div class="contact-info__close-button close-button">&times;</div>
      </div>
      <ul>
        <li class="link-set__item link-set__item--primary">
          <span class="link-set__item__title">
            <?php bloginfo('name'); ?>
          </span>
          <span class="link-set__item__label">
            <?php echo date( 'Y' ); ?>
          </span>
        </li>
      </ul>
      <div class="contact-info__content">
        <?php the_field( 'content', 'option' ); ?>
      </div>
      <div class="contact-info__links">
        <?php if ( have_rows( 'contact_links', 'option' ) ): ?>
          <?php while ( have_rows( 'contact_links', 'option' ) ): the_row(); ?>
            <a href="<?php the_sub_field( 'url' ); ?>" class="contact-info__links__link default-link" target="_blank"><?php the_sub_field( 'label' ); ?></a>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </li>

  <li class="link-set__item link-set__item--single link-set__item--news">
    <a href="<?php echo site_url( '/news' ); ?>" class="blank-link">
      <span class="link-set__item__title">
        News
      </span>
    </a>
  </li>
</ul>

<div class="active-media-wrapper" id="active-media-wrapper"></div>
