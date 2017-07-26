var UNISON = UNISON || {};

UNISON.StepThree = {
  SELECTOR: null,
  salaryRanges: [
    {
      'start': 0,
      'end': 9999,
      'cost': 2
    },
    {
      'start': 10000,
      'end': 19999,
      'cost': 5
    },
    {
      'start': 20000,
      'end': 29999,
      'cost': 10
    },
    {
      'start': 30000,
      'end': 39999,
      'cost': 15
    },
    {
      'start': 40000,
      'end': 49999,
      'cost': 20
    },
    {
      'start': 50000,
      'end': 999999999999999999999999,
      'cost': 40
    }
  ],

  init: function() {
    this.SELECTOR = $('.js-step-three');
    this.createListeners();
  },

  // ======================================
  // Currency input related
  // ======================================
  updateSubscriptionCalculation: function(cost) {
    this.SELECTOR.find('.js-subscription-calculation').html(cost + '.00');
  },

  showCalculation: function() {
    this.SELECTOR.find('.currency-display').addClass('currency-display--active');
  },

  hideCalculation: function() {
    this.SELECTOR.find('.currency-display').removeClass('currency-display--active');
  },

  checkCost: function(value) {
    var i = 0;
    for (; i < this.salaryRanges.length; i++) {
      var start = this.salaryRanges[i].start;
      var end = this.salaryRanges[i].end;
      var cost = this.salaryRanges[i].cost;
      if (value >= start && value <= end) {
        return cost;
      }
    }
  },

  // ======================================
  // Secondary job related
  // ======================================
  showSecondaryJobForm: function() {
    var extra = this.SELECTOR.find('.step__form--second-job-extra')
    extra.addClass('step__form--second-job-extra--active');
    extra.find('.step__form-input').attr('data-required', true);
  },

  hideSecondaryJobForm: function() {
    var extra = this.SELECTOR.find('.step__form--second-job-extra')
    extra.removeClass('step__form--second-job-extra--active');
    extra.find('.step__form-input').removeAttr('data-required');
  },

  // ======================================
  // Event listener related
  // ======================================
  onCurrencyInput: function(e) {
    var input = $(e.currentTarget);
    var value = input.val();
    if (value.length && value >= 0) {
      var cost = this.checkCost(value);
      this.showCalculation();
      this.updateSubscriptionCalculation(cost);
    } else {
      this.hideCalculation();
    }
  },

  onSecondaryJobInputChange: function(e) {
    var secondaryJob = $(e.currentTarget).val();
    if (secondaryJob === 'true') {
      this.showSecondaryJobForm();
    } else {
      this.hideSecondaryJobForm();
    }
  },

  // ======================================
  // Create all event listeners
  // ======================================
  createListeners: function() {
    this.SELECTOR.find('.currency-input__input').on('input', function(e) { UNISON.StepThree.onCurrencyInput(e); });
    this.SELECTOR.find('.step__form--second-job input').on('change', function(e) { UNISON.StepThree.onSecondaryJobInputChange(e); });
  }
};

UNISON.StepThree.init();