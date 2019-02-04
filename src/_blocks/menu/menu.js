(function() {
  window.Menu = class {
    constructor(options) {
      this._elem = options.elem;
      this._opened = options.opened || false;
      this._subMenuOpened = false;
      this._elem.addEventListener("click", this._onClick.bind(this));
    }

    _onClick(e) {
      let target = e.target;

      if (target.closest(`[data-menu-sublink]`)) {
        e.preventDefault();

        this._subMenuToggle(target);
        return false;
      }

      if (target.closest(`[data-menu-btn]`)) {
        e.preventDefault();

        this._menuToggle();
      }
    }

    // Menu
    _onMenuChange() {
      this._elem.dispatchEvent(new CustomEvent("bodyOverflow", {
        bubbles: true,
        detail: {
          open: this._opened
        }
      }));
    }

    _menuToggle() {
      this._elem.dataset.active == `true` ? this._menuClose() : this._menuOpen();
    }

    _menuOpen() {
      this._elem.dataset.active = true;
      this._opened = true;
      this._onMenuChange();
    };

    _menuClose() {
      this._elem.removeAttribute(`data-active`);
      this._opened = false;
      this._onMenuChange();
    };

    // Submenu
    _onSubmenuChange() {
      this._elem.dispatchEvent(new CustomEvent("menuSecondOpen", {
        bubbles: true
      }));
    }

    _subMenuToggle(target) {
      target.closest(`.menu__item`).dataset.submenuActive == `true` ? this._subMenuClose(target) : this._subMenuOpen(target);
    }

    _subMenuOpen(target) {
      target.closest(`.menu__item`).dataset.submenuActive = true;
      this._subMenuOpened = true;

      this._onSubmenuChange();
    };

    _subMenuClose(target) {
      target.closest(`.menu__item`).removeAttribute(`data-submenu-active`);
      this._subMenuOpened = false;

      this._onSubmenuChange();
    };
  }

  if (document.querySelector(`[data-menu]`)) {
    window.pageMenu = new Menu({
      elem: document.querySelector(`[data-menu]`)
    });
  }
})();
