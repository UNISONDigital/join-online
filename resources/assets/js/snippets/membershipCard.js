var UNISON = UNISON || {};

UNISON.MembershipCard = {
  SELECTOR: null,
  firstTimeInput: true,

  init: function() {
    this.SELECTOR = $('.membership-card');
    this.createListeners();
  },

  clearCurrentNameValue: function() {
    this.SELECTOR.find('.js-membership-card-fname').empty();
    this.SELECTOR.find('.js-membership-card-lname').empty();
  },

  onFnameInput: function(e) {
    var value = $(e.currentTarget).val();
    if (this.firstTimeInput) {
      this.clearCurrentNameValue();
      this.firstTimeInput = false;
    }
    this.SELECTOR.find('.js-membership-card-fname').html(value);
  },

  onLnameInput: function(e) {
    var value = $(e.currentTarget).val();
    if (this.firstTimeInput) {
      this.clearCurrentNameValue();
      this.firstTimeInput = false;
    }
    this.SELECTOR.find('.js-membership-card-lname').html(value);
  },

  createListeners: function() {
    $('.js-membership-card-input-fname').on('input', function(e) { UNISON.MembershipCard.onFnameInput(e); });
    $('.js-membership-card-input-lname').on('input', function(e) { UNISON.MembershipCard.onLnameInput(e); });
  }
}

UNISON.MembershipCard.init();