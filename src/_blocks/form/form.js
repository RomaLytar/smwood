;(function() {
  window.FormCustomValidation = class {
    constructor(obj) {
      this.obj = obj;
      this._popup = this.obj.closest(`[data-popup]`);
      this._regExp = {
        EMAIL: /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
        NAME: /^[A-Za-zА-Яа-яЁё]{2,}$/,
        SURNAME: /^[A-Za-zА-Яа-яЁё]{2,}$/,
        TEXTAREA: /^.{2,}$/,
        TEL: /^(\+[0-9][0-9])\s(\([0-9]{3}\))\s([0-9]{3})\s([0-9]{2})\s([0-9]{2})$/
      };
      this.requiredFields = obj.querySelectorAll(`:required`);
      this.allFields = obj.querySelectorAll(`[data-input]`);
      this.buttonSubmit = obj.querySelector(`[type=submit]`);
      this.buttonSubmit.addEventListener(`click`, (e) => this.checkValidation(e));
      this.LANG = document.documentElement.lang.toUpperCase();

      this.TextError = {
        EMAIL: {
          RU: `E-mail имеет не верный формат! Верный формат x@x.x!`
        },
        NAME: {
          RU: `Поле должно состоять только из букв!`
        },
        NAME_LENGTH: {
          RU: `Поле должно состоять минимум из 2 букв!`
        },
        MESSAGE: {
          RU: `Это поле обязательно для заполнения!`
        }
      };

      this.FeedbackText = {
        OK: {
          RU: `Спасибо! Мы скоро с вами свяжемся`
        },
        ERROR: {
          RU: `Ваши данные не были переданы. Попробуйте пожалуста еще`
        }
      };

      [...this.allFields].forEach((item) => item.addEventListener(`input`, (e) => this._keyInput(item)));
    }

    checkValidation(e) {
      let formValid = [...this.requiredFields].every((item) => this.fieldValidation(item));

      if (formValid) {
        e.preventDefault();
        this._sendData();
      } else {
        console.warn(`Not correct data`);
      }
    };

    fieldValidation(item) {
      let value = item.value,
            type = item.type;

      if (type == `text`) type = item.name;

      type = type.toUpperCase();

      if (this._regExp[type]) {

        if (value.search(this._regExp[type]) != 0) {
          this._fieldInvalid(item);
          return false;
        } else {
          this._fieldValid(item);
          return true;
        }
      } else {
        console.log(`This field type ${type} was not found in regExp`);
        return true;
      }
    };

    _keyInput(item) {
      if ([...this.requiredFields].indexOf(item) != -1) {
        this.fieldValidation(item);
      } else {
        if (item.value.length) {
          item.dataset.inputDone = true;
        } else {
          item.removeAttribute(`data-input-done`);
        }
      }
    };

    _fieldValid(item) {
      item.removeAttribute(`data-input-error`);
      item.dataset.inputDone = true;
      item.setCustomValidity(``);
    };

    _fieldInvalid(item) {
      item.removeAttribute(`data-input-done`);
      item.dataset.inputError = true;

      const itemType = item.type.toUpperCase();

      if (item.name.toUpperCase() === `NAME` || item.name.toUpperCase() === `SURNAME`) {
        if (item.validity.tooShort) {
          item.setCustomValidity(this.TextError.NAME_LENGTH[this.LANG]);
        } else {
          item.setCustomValidity(this.TextError.NAME[this.LANG]);
        }
      } else {
        item.setCustomValidity(this.TextError[item.name.toUpperCase()][this.LANG]);
      }
    };

    _sendData(item) {
      window.customAjax({
        url: this.obj.action,
        method: this.obj.method,
        data: new FormData(this.obj),
      }).then((data) => {
        if (this._popup) {
          this._popup.customPopup.close();
        }
        window.popupFeedback(this.FeedbackText.OK[this.LANG]);
      }, (error) => {
        window.popupFeedback(this.FeedbackText.ERROR[this.LANG]);
        console.warn(error);
      });
    };
  }
})();

;(function(){
  [...document.querySelectorAll(`[data-form-validate]`)].map((item) => new FormCustomValidation(item));
})();
