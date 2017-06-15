require('./bootstrap');
require('./snippets/informationBlock');

var UNISON = UNISON = {};

UNISON.Global = {
  init: () => {
    UNISON.Global.setupSelect();
  },

  setupSelect: () => {
    $('.js-selectric').selectric();
  }
}

UNISON.Global.init();