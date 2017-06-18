var UNISON = UNISON || {};

UNISON.StepThree = {
  SELECTOR: null,

  init: function() {
    this.SELECTOR = $('.js-step-four');
    this.createListeners();
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
    form.find('.step__form-input').attr('data-required', false);
  },

  showDirectDebitForm: function() {
    var form = this.SELECTOR.find('.payment__direct-debit')
    form.addClass('payment__direct-debit--active');
    form.find('.step__form-input').attr('data-required', true);
  },

  hideDirectDebitForm: function() {
    var form = this.SELECTOR.find('.payment__direct-debit')
    form.removeClass('payment__direct-debit--active');
    form.find('.step__form-input').attr('data-required', false);
  },

  // ======================================
  // Event listener related
  // ======================================
  onPaymentInputChange: function(e) {
    var paymentType = $(e.currentTarget).val();
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
    this.SELECTOR.find('.step__form--payment-toggle input').on('change', function(e) { UNISON.StepThree.onPaymentInputChange(e); });
  }
};

UNISON.StepThree.init();