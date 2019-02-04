<li>
                <article class="news__item">
                    <a href="<?php the_permalink(); ?>" class="news__photo">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
                    </a>
                    <h3 class="news__item-title">
                        <a href="<?php the_permalink(); ?>"><?= the_title(); ?></a>
                    </h3>
                    <time class="news__item-date" datetime="2018-08-25"><?= the_date('j F Y'); ?></time>
                    <div class="news__descr">
					    <?= get_the_content(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="news__link"><?= ($name_button == '') ? 'Подробнее' : $name_button ?></a>
                </article>
            </li>