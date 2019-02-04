(() => {
  if (document.querySelector(`[data-slowly-link]`)) {
    const link = document.querySelectorAll(`[data-slowly-link]`);

    [...link].forEach(item => {
      $(item).on(`click`, function() {
        if (location.pathname.replace(/^\//,") == this.pathname.replace(/^\//,") && location.hostname == this.hostname) {

          let target = $(this.hash);

          target = target.length ? target : $(`[name=` + this.hash.slice(1) +`]`);

          if (target.length) {
            $(`html, body`).animate({
              scrollTop: target.offset().top - document.querySelector(`.header`).offsetHeight - parseInt(getComputedStyle(document.querySelector(item.getAttribute(`href`))).marginTop)
            }, 1000);

            return false;
          }
        }
      });
    });
  }
})();
