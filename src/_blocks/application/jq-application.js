(() => {
  const slider = document.querySelectorAll(`[data-application]`);

  if (!slider) return false;

  const createDestroySliders = () => {
    const windowWidth = window.innerWidth;

    if (windowWidth < 768) {
      slider.forEach(item => {
        if (item.dataset.slider != `active`) {
          $(item).slick({
            infinite: true,
            arrows: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: true,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
              {
                breakpoint: 481,
                settings: {
                  slidesToShow: 1
                }
              }
            ]
          });

          item.dataset.slider = `active`;
        }
      });
    } else {
      slider.forEach(item => {
        if (item.dataset.slider == `active`) {
          $(item).slick(`unslick`);

          item.removeAttribute(`data-slider`);
        }
      });
    }
  };

  createDestroySliders();

  window.addEventListener(`resize`, createDestroySliders);
})();
