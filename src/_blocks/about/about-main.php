<section class="about about--center">
    <?php $id = 40;
    $post = get_post($id);
    $contents = $post->post_content; ?>
    <div class="wrap-small">
        <h2 class="title"><?= get_the_title(); ?></h2>
        <div class="about__descr">
            <?php echo $contents ;?>
        </div>
        <a href="<?= get_page_link(40) ?>" class="btn btn--bordered btn--big">Далее</a>
    </div>
</section>
