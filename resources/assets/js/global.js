var UNISON = UNISON = {};

UNISON.Global = {
  init: function() {
    this.setupSelect();
  },

  setupSelect: function() {
    $('.js-selectric').selectric();
  }
}

UNISON.Global.init();