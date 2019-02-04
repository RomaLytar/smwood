<form class="form" action="<?php bloginfo('template_url'); ?>/write_us.php" method="POST" name="book" data-form-validate>
  <label class="form__label">
    <input
      class="form__input"
      type="text"
      minlength="2"
      pattern="^[A-Za-zА-Яа-яЁё]{2,}$"
      name="name"
      required
      data-input
      placeholder="Имя*"
    >
  </label>
  <label class="form__label">
    <input
      class="form__input"
      type="email"
      pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
      name="email"
      required
      data-input
      placeholder="E-mail*"
    >
  </label>
  <label class="form__label">
    <input
      class="form__input"
      type="tel"
      minlength="5"
      pattern="(\+[0-9][0-9])\s(\([0-9]{3}\))\s([0-9]{3})\s([0-9]{2})\s([0-9]{2})$"
      name="tel"
      data-input
      placeholder="Телефон"
    >
  </label>
  <label class="form__label form__label--textarea">
    <textarea
      class="form__input form__input--textarea"
      minlength="2"
      pattern="^.{2,}$"
      name="message"
      data-input
      placeholder="Сообщение"
    ></textarea>
  </label>
  <button type="submit" class="btn btn--orange btn--big">Связаться</button>
</form>
