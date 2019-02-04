<section class="popup" data-popup="order">
  <div class="popup__inner">
    <div class="popup__wrap">
      <button type="button" class="popup__close" data-popup-close>
        Close
        <svg width="24" height="24" fill="#000000">
          <use xlink:href="/wp-content/themes/smwood/img/svg/symbols.svg#icon-cross" />
        </svg>
      </button>
      <h2 class="popup__title">Заполните контактную форму</h2>
      <p class="popup__descr">и мы свяжемся с вами</p>
      <?php get_template_part('includes/form/form-order'); ?>
    </div>
  </div>
</section>
