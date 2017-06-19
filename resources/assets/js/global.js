var UNISON = UNISON = {};

// A litte helper for form stuff up here
// (had issues seperating this out into a 
// new file because of require I imagine.
// Doing it here instead.)
UNISON.StandardForm = function(selector) {

  var SELECTOR = selector;
  var dropdowns = [];
  var matches = [];

  function init() {
    setupDropdowns();
    createListeners();
  }

  // =======================================
  // Set up select boxes to be custom ones
  // =======================================
  function setupDropdowns() {
    // var select = $('.js-selectric');
    // var i = 0;
    // for ()
    $('.js-selectric').selectric();
  }

  // =======================================
  // Mimic a click on a radio button when 
  // tabbed to and enter is clicked on
  // the keyboard
  // =======================================
  function onAltRadioKeyup(e) {
    if (e.keyCode === 13) {
      var el = $(e.currentTarget);
      el.find('input').trigger('click');
    }
  }

  // =======================================
  // Validate form
  // =======================================
  function validate() {
    requiredFields = SELECTOR.find('[data-required]');
    var i = 0, length = requiredFields.length, valid = true, type, formElement, matches = [];
    for (; i < length; i++) {
      formElement = requiredFields[i];
      type = formElement.type;
      // Check if any fields are empty
      if (type === 'text' || type === 'textarea' || type === 'password' || type === 'number') {
        if (formElement.value === '') {
          showError(formElement);
          valid = false;
        } else {
          hideError(formElement);
        }
      // Check if email is valid
      }
      if (formElement.hasAttribute('data-email')) {
        if (!validateEmail(formElement.value)) {
          showError(formElement);
          valid = false;
        } else {
          hideError(formElement);
        }
      }
      // Check if a dropdown item has been selected
      if (formElement.hasAttribute('data-select')) {
        if (formElement.value === 'null' || formElement.value === '') {
          showError(formElement, true);
          valid = false;
        } else {
          hideError(formElement, true);
        }
      }
      if (formElement.hasAttribute('data-match')) {
        // Push all values we want to match into an array
        matches.push(formElement.value);
      }
      if (formElement.hasAttribute('data-ni')) {
        if (!validateNI(formElement.value) && formElement.value.length !== 9) {
          showError(formElement);
          valid = false;
        } else {
          hideError(formElement)
        }
      }
    }
    // After the loop, compare the array items you would like to match
    var k = 0, length = matches.length;
    for (; k < length; k++) {
      if (matches[k] !== matches[0] || matches[k] === '') {
        showError(SELECTOR.find('[data-match]'));
        valid = false;
      } else {
        hideError(SELECTOR.find('[data-match]'));
      }
    }
    return valid;
  }

  // =======================================
  // Show error
  // =======================================
  function showError(el, isSelect) {
    var selector = null;
    // We are using a custom select box lib so we
    // have to do a bit of searching around for it
    // before we add an error class to it
    if (isSelect) {
      selector = $(el).closest('.selectric-js-selectric').find('.selectric');
    } else {
      selector = $(el);
    }
    selector.addClass('step__form-input--error');
  }

  // =======================================
  // Hide error
  // =======================================
  function hideError(el, isSelect) {
    var selector = null;
    // We are using a custom select box lib so we
    // have to do a bit of searching around for it
    // before we add an error class to it
    if (isSelect) {
      selector = $(el).closest('.selectric-js-selectric').find('.selectric');
    } else {
      selector = $(el);
    }
    selector.removeClass('step__form-input--error');
  }

  // =======================================
  // Validate National Insurance number
  // =======================================
  function validateNI(value) {
    var exp1 = /^[A-CEGHJ-NOPR-TW-Z]{1}[A-CEGHJ-NPR-TW-Z]{1}[0-9]{6}[A-D\s]{1}/i;
    var exp2 = /(^GB)|(^BG)|(^NK)|(^KN)|(^TN)|(^NT)|(^ZZ).+/i;
    if (value.match(exp1) && !value.match(exp2))  {
      return value.toUpperCase()
    } else {
      return false;
    }
  }

  // =======================================
  // Validate email address
  // =======================================
  function validateEmail(val) {
    var re = /([@.])\w+/g;
    return re.test(val);
  }

  // =======================================
  // On form submit, validate
  // =======================================
  function onFormSubmit(e) {
    e.preventDefault();
    var valid = validate();
    if (valid) {
      submitForm()
    } else {
      scrollToError();
    }
  }

  // =======================================
  // Submit form like normal once everything is
  // filled in and validated
  // =======================================
  function submitForm() {
    var url = SELECTOR.attr('action');
    $.ajax({ url: url });
  }

  // Scroll to error
  function scrollToError() {
    var el = SELECTOR.find('.step__form-input--error').first();
    var top = (el.offset().top - $('.global-header').outerHeight()) - 60;
    $('html, body').animate({ scrollTop: top });
  }

  function onInputClicked(e) {
    var el = $(e.currentTarget);
    hideError(el, false);
  }

  function onSelectricClicked(e) {
    var el = $(e.currentTarget);
    hideError(el, false);
  }

  // =======================================
  // Create listeners
  // =======================================
  function createListeners() {
    SELECTOR.find('.alt-radio, .alt-radio-tabbed').on('keypress', function(e) { onAltRadioKeyup(e); });
    SELECTOR.on('submit', function(e) { onFormSubmit(e); });
    SELECTOR.find('input').on('click', function(e) { onInputClicked(e); });
    SELECTOR.find('.selectric').on('click', function(e) { onSelectricClicked(e); });
  }

  init();
}

// Start global
UNISON.Global = {
  init: function() {
    this.setupForm();
  },

  setupForm: function() {
    var el = $('[data-module="StandardForm"]');
    var form = new UNISON.StandardForm(el);
  }
}

UNISON.Global.init();