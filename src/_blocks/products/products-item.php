<section class="products-item">
  <div class="wrap-small">
      <?php while ( have_posts() ) : the_post(); ?>
              <?php $price = get_post_meta($post->ID, 'wpcf-price', true); ?>
              <?php $name_button = get_post_meta($post->ID, 'wpcf-name-button', true); ?>
              <h2 class="title products-item__title">Заглушка для конфирмата</h2>
              <div class="products-item__info">
                  <figure class="products-item__img">
                      <img src="<? the_post_thumbnail_url(); ?>" alt="<? the_title(); ?>">
                  </figure>
                  <div class="products-item__about">
                      <h3 class="products-item__name"><? the_title(); ?></h3>
                      <p class="products-item__price"><?= $price ?></p>
                      <div class="products-item__descr">
                          <?= get_the_content(); ?>
                      </div>
                      <a data-popup-link="order" class="btn btn--orange products-item__btn">Заказать</a>
                  </div>
              </div>
          <?php endwhile; ?>
  </div>
</section>
