<section class="about">
  <div class="wrap-small">
	  <?php if ( have_posts() ){
		  while ( have_posts() ){ the_post(); ?>
              <h2 class="title"><?= get_the_title(); ?></h2>
			  <?php $advantage = get_post_meta($post->ID, 'wpcf-advantage', false); ?>
              <div class="about__descr">
                 <?php the_content(); ?>
                  <h3><?php echo ($advantage != '') ? 'Преимущества нашей компании:' : '' ?>     </h3>
                  <ul>
	                  <?php foreach ($advantage as $i) : ?>
                          <li><?php echo $i; ?></li>
	                  <?php endforeach; ?>
                  </ul>
                  <p><?php echo ($advantage != '') ? 'В лице нашей компании вы найдете надежного партнера, с которым вы достигнете своих бизнес целей.' : '' ?></p>
              </div>
			  <?php
		  }
	  } else {
		  echo wpautop( 'Постов для вывода не найдено.' );
	  }
	  ?>
  </div>
</section>
