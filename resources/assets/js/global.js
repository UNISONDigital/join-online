var UNISON = UNISON = {};

UNISON.Global = {
  init: function() {
    this.setupSelect();
    this.createListeners();
  },

  setupSelect: function() {
    $('.js-selectric').selectric();
  },

  onAltRadioKeyup: function(e) {
    if (e.keyCode === 13) {
      var el = $(e.currentTarget);
      el.find('input').trigger('click');
    }
  },

  createListeners: function() {
    $('.alt-radio, .alt-radio-tabbed').on('keypress', function(e) { UNISON.Global.onAltRadioKeyup(e); });
  }
}

UNISON.Global.init();