var UNISON = UNISON || {};

UNISON.StepTwo = {
  SELECTOR: null,
  addressInputState: 'auto',
  loadedAddresses: true,

  init: function() {
    this.SELECTOR = $('.step__form-address');
    this.createListeners();
  },

  showLoader: function() {
    this.SELECTOR.find('.standard-loader').addClass('standard-loader--active');
  },

  hideLoader: function() {
    this.SELECTOR.find('.standard-loader').removeClass('standard-loader--active');
  },

  onAddressAutoInput: function(e) {
    if (!this.loadedAddresses) {
      var input = $(e.currentTarget);
      var url = input.data('url');
      this.showLoader();
      $.ajax({
        url: url,
        success: function() {
          UNISON.StepTwo.addressLoadComplete();
        },
        error: function() {
          UNISON.StepTwo.addressLoadError();
        }
      })
    }
  },

  addressLoadComplete: function() {
    this.loadedAddresses = true;
    this.hideLoader();
    this.showAddressResults();
  },

  addressLoadError: function() {
    this.hideLoader();
    this.showLoadError();
  },

  showAddressResults: function() {
    this.SELECTOR.find('.js-address-auto-results').addClass('js-address-auto-results--active');
  },

  onAddressManualTriggerClicked: function(e) {
    e.preventDefault();
    this.toggleAddressInputState();
  },

  toggleAddressInputState: function() {
    if (this.addressInputState === 'auto') {
      this.hideAutoForm();
      this.showManualForm();
      this.addressInputState = 'manual';
      this.updateTrigger();
    } else {
      this.showAutoForm();
      this.hideManualForm();
      this.addressInputState = 'auto';
      this.updateTrigger();
    }
  },

  showManualForm: function() {
    this.SELECTOR.find('.js-address-manual').addClass('js-address-manual--active');
  },

  hideManualForm: function() {
    this.SELECTOR.find('.js-address-manual').removeClass('js-address-manual--active');
  },

  showAutoForm: function() {
    this.SELECTOR.find('.js-address-auto').removeClass('js-address-auto--hidden');
  },

  hideAutoForm: function() {
    this.SELECTOR.find('.js-address-auto').addClass('js-address-auto--hidden');
  },

  updateTrigger: function() {
    var trigger = this.SELECTOR.find('.js-address-toggle');
    var html = '';
    if (this.addressInputState === 'auto') {
      html = trigger.data('manual-message');
    } else {
      html = trigger.data('auto-message');
    }
    trigger.html(html);
  },

  createListeners: function() {
    this.SELECTOR.find('.js-address-auto-input').on('input', function(e) { UNISON.StepTwo.onAddressAutoInput(e) });
    this.SELECTOR.find('.js-address-toggle').on('click', function(e) { UNISON.StepTwo.onAddressManualTriggerClicked(e) });
  }
}

UNISON.StepTwo.init()