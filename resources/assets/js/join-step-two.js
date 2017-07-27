var UNISON = UNISON || {};

UNISON.StepTwo = {
  SELECTOR: null,
  addressInputState: 'auto',
  autoCompleteController: null,

  init: function() {
    this.SELECTOR = $('.step__form-address');

    if ($('#details-address-auto').length == 1) {
	    this.setupAddressAutocomplete();

	    if ($('.js-has-details').length == 1) {
	    	this.toggleAddressInputState();
	    }
    	this.createListeners();
    }
  },

  setupAddressAutocomplete: function() {
    this.autoCompleteController = new IdealPostcodes.Autocomplete.Controller({
      api_key: "iddqd",
      inputField: "#details-address-auto",
      limit: 150,
      outputFields: {
        line_1: "#details-address-one",
        line_2: "#details-address-two",
        line_3: "#details-address-three",
        post_town: "#details-town-city",
        postcode: "#details-postcode"
      },
      onAddressSelected: function() {
        UNISON.StepTwo.onAddressSelected();
      },
      onInput: function() {
        UNISON.StepTwo.onAddressInput();
      },
      onSuggestionsRetrieved: function() {
        UNISON.StepTwo.onAddressSuggestionsRetrieved();
      },
      onClose: function() {
        UNISON.StepTwo.onAddressSuggestionsClosed();
      }
    });
  },

  onAddressSelected: function() {
    this.showManualForm();
    // Remove required attribute from auto input
    var autoForm = this.SELECTOR.find('.js-address-auto input').removeAttr('data-required');
    // Remove the address toggle as this is now not needed
    this.hideAddressToggleButton();
  },

  onAddressInput: function() {
    this.showLoader();
  },

  onAddressSuggestionsRetrieved: function() {
    this.hideLoader();
  },

  onAddressSuggestionsClosed: function() {
    this.hideLoader();
  },

  showLoader: function() {
    this.SELECTOR.find('.standard-loader').addClass('standard-loader--active');
  },

  hideLoader: function() {
    this.SELECTOR.find('.standard-loader').removeClass('standard-loader--active');
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
    var manualForm = this.SELECTOR.find('.js-address-manual');
    manualForm.addClass('js-address-manual--active');
    manualForm.find('input.required').attr('data-required', true);
  },

  hideManualForm: function() {
    var manualForm = this.SELECTOR.find('.js-address-manual');
    manualForm.removeClass('js-address-manual--active');
    manualForm.find('input.required').removeAttr('data-required');
  },

  showAutoForm: function() {
    var autoForm = this.SELECTOR.find('.js-address-auto');
    autoForm.removeClass('js-address-auto--hidden');
    autoForm.find('input.required').attr('data-required', true);
  },

  hideAutoForm: function() {
    var autoForm = this.SELECTOR.find('.js-address-auto');
    autoForm.addClass('js-address-auto--hidden');
    autoForm.find('input.required').removeAttr('data-required');
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

  hideAddressToggleButton: function() {
    this.SELECTOR.find('.js-address-toggle').addClass('step__form-toggle--hidden');
  },

  createListeners: function() {
    // this.SELECTOR.find('.js-address-auto-input').on('input', function(e) { UNISON.StepTwo.onAddressAutoInput(e) });
    this.SELECTOR.find('.js-address-toggle').on('click', function(e) { UNISON.StepTwo.onAddressManualTriggerClicked(e) });
  }
}

UNISON.StepTwo.init()