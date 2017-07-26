var UNISON = UNISON || {};

UNISON.informationBlock = {

  SELECTOR: null,

  init: () => {
    this.SELECTOR = $('.information-block');
    UNISON.informationBlock.createListeners();
  },

  onBlockClicked: (e) => {
    var el = $(e.currentTarget).find('.information-block__items');
    el.toggleClass('information-block__items--active');
  },

  createListeners: () => {
    this.SELECTOR.on('click', (e) => { UNISON.informationBlock.onBlockClicked(e); });
  }

}

UNISON.informationBlock.init();