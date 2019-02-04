<section class="products">
  <div class="wrap">
    <h2 class="title">Наша продукция</h2>
  </div>

  <div class="products__list-wrap">
    <ul class="products__list products__list--main">
	    <?php $equipment = new WP_Query(['post_type' => 'products', 'posts_per_page' => 3]); ?>
	    <?php if ($equipment->have_posts()) : ?>
		    <?php while($equipment->have_posts()) : $equipment->the_post(); ?>
			    <?php $price = get_post_meta($post->ID, 'wpcf-price', true); ?>
			    <?php $name_button = get_post_meta($post->ID, 'wpcf-name-button', true); ?>
                <li class="products__item">
                    <a href="<?php the_permalink(); ?>" class="products__img">
                        <img src="<?php the_post_thumbnail_url() ?>" alt="<?= the_title();?>">
                    </a>
                    <div class="products__item-info">
                        <h3 class="products__item-title"><a href="<?php the_permalink(); ?>"><?= the_title(); ?></a></h3>
                        <p class="products__item-price"><?= $price ?></p>
                        <a class="btn btn--orange products__item-btn" data-popup-link="order"><?= ($name_button == '') ? 'Заказать' : $name_button ?></a>
                    </div>
                </li>
		    <?php endwhile; ?>
	    <?php endif; ?>
    </ul>
  </div>

  <div class="wrap">
    <a href="<?= get_page_link(45) ?>" class="btn btn--bordered btn--big">Каталог</a>
  </div>
</section>
