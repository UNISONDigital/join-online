var UNISON = UNISON || {};

UNISON.StepFour = {
  SELECTOR: null,

  init: function() {
    this.SELECTOR = $('.js-step-four');
    this.createListeners();

    this.hideDirectDebitForm();
    this.hideSalaryForm();

    // show the correct form based on the payment method
    if ($('.js-payment-salary').is(':checked')) {
    	this.showSalaryForm();
    }
    if ($('.js-payment-direct-debit').is(':checked')) {
    	this.showDirectDebitForm();
    }
  },

  // ======================================
  // Payment related
  // ======================================
  showSalaryForm: function() {
    var form = this.SELECTOR.find('.payment__salary')
    form.removeClass('payment__salary--hidden');
    form.find('.step__form-input').attr('data-required', true);
  },

  hideSalaryForm: function() {
    var form = this.SELECTOR.find('.payment__salary')
    form.addClass('payment__salary--hidden');
    form.find('.step__form-input').removeAttr('data-required');
  },

  showDirectDebitForm: function() {
    var form = this.SELECTOR.find('.payment__direct-debit')
    form.addClass('payment__direct-debit--active');
    form.find('.step__form-input').attr('data-required', true);
    form.find('.step__form-input--sort-code').attr('data-sort-code', true);
  },

  hideDirectDebitForm: function() {
    var form = this.SELECTOR.find('.payment__direct-debit')
    form.removeClass('payment__direct-debit--active');
    form.find('.step__form-input').removeAttr('data-required');
    form.find('.step__form-input--sort-code').removeAttr('data-sort-code');
  },

  // ======================================
  // Event listener related
  // ======================================
  onPaymentInputChange: function(e) {
    var paymentType = $(e.currentTarget).val();
    console.log('test')
    if (paymentType === 'salary') {
      this.showSalaryForm();
      this.hideDirectDebitForm();
    } else {
      this.hideSalaryForm();
      this.showDirectDebitForm();
    }
  },

  // ======================================
  // Create all event listeners
  // ======================================
  createListeners: function() {
  	console.log(this.SELECTOR.find('.step__form--payment-toggle input:radio'))
    this.SELECTOR.find('.step__form--payment-toggle input:radio').on('change', function(e) { UNISON.StepFour.onPaymentInputChange(e); });
  }
};

UNISON.StepFour.init();