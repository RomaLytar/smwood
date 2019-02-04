<section class="news">
  <div class="wrap">
	  <?php while ( have_posts() ) : the_post(); ?>
		  <?php $name_button = get_post_meta($post->ID, 'wpcf-learn-mo', true); ?>
          <article class="news__article">
              <h2 class="title news__article-title">Заглушка для конфирмата</h2>
              <figure class="news__img">
                  <img src="<?php the_post_thumbnail_url(); ?> " alt="<?php the_title(); ?>">
              </figure>
              <time class="news__item-date" datetime="2018-08-25"><?php the_time('j F Y'); ?></time>
              <div class="news__item-descr">
                  <h3><?php the_title(); ?></h3>
                  <?= get_the_content(); ?>
              </div>
              <a href="#" onclick="history.back();" class="news__link news__back">Назад</a>
          </article>
      <?php endwhile; ?>

  </div>
</section>
