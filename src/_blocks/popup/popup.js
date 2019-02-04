;(function() {
  window.CustomPopup = class {
    constructor(obj) {
      obj.customPopup = this;

      this._item = obj;
      this.linksArr = document.querySelectorAll(`[data-popup-link = ${obj.dataset.popup}]`);
      this._opened = false;
      this._item.addEventListener("click", (e) => this._click(e));
      this.onPopupEscPressHandler = this._onPopupEscPress.bind(this);

      if (this.linksArr) {
        [...this.linksArr].forEach((link) => {
          link.addEventListener("click", (e) => this.open());
          link.addEventListener("keydown", (e) => window.keyCodeObject.isEnterEvent(e, function() {
            this.open();
          }.bind(this)));
        });
      }
    }

    _onPopupEscPress(e) {
      window.keyCodeObject.isEscEvent(e, this.close.bind(this));
    }

    _click(e) {
      if (e.target.closest("[data-popup-close]")) {
        this.close();
      }
    }

    open() {
      this._item.classList.add("popup--active");
      this._opened = true;
      this._onChange();

      window.addEventListener("keydown", this.onPopupEscPressHandler);
    }

    close() {
      this._item.classList.remove("popup--active");
      this._opened = false;
      this._onChange();

      window.removeEventListener("keydown", this.onPopupEscPressHandler);
    }

    _onChange() {
      let event = new CustomEvent("bodyOverflow", {
        bubbles: true,
        detail: {
          open: this._opened,
          openedObj: this._item
        }
      });

      this._item.dispatchEvent(event);
    }
  };

  window.popupArr = [...document.querySelectorAll(`[data-popup]`)].forEach((item) => new CustomPopup(item));
})();
