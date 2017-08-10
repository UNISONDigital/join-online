var UNISON = UNISON || {};

UNISON.StepThree = {
  SELECTOR: null,

  init: function() {
    this.SELECTOR = $('.js-step-three');
    this.createListeners();
    this.setupEmployerSelectize();
    this.onFrequencyChanged();

    console.log($('.js-employer-name').data('manual-entry'))
    if ($('.js-employer-name').data('manual-entry')) {
    	this.onManuallyEnterEmployer(null);
    }
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
      this.showCalculation();
      this.recalculateBand();
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

  onManuallyEnterEmployer: function(e) {
  	if (e) {
  		e.preventDefault();
  	}
  	console.log('here')

  	$('.js-automatic-employer').hide();
  	$('.js-automatic-employer input').removeAttr('data-required');

  	$('.js-manual-employer').show();
  	$('.js-manual-employer input').attr('data-required', true);
  },

  lookupWorkplaces: function(employerId) {
  	$.ajax({'url': '/api/workplaces/' + employerId}).done(function(res) {
  		res.result.forEach(function(workplace, index) {
  			var clone = $('.js-workplace-template').clone();
  			var workplace_id = 'workplace-' + index;

  			$('.js-workplace-address', clone).text(workplace.address_1);
  			$('.js-workplace-type', clone).text(workplace.workplace_type);
  			$('input', clone).attr('value', workplace.id).attr('id', workplace_id);
  			$('label', clone).attr('for', workplace_id);

  			clone.appendTo('.js-workplaces');
  			clone.show();
  		});

  		$('.js-workplaces').slideDown();
  	});
  },

  setupEmployerSelectize: function() {
  	var lookupWorkplaces = this.lookupWorkplaces;

		$('.js-employer').selectize({
			valueField: 'id',
			labelField: 'name',
			searchField: 'name',
			maxItems: 1,
			options: [],
			create: false,
			render: {
				option: function(item, escape) {
					return '<div>' + item.name + '</div>';
				}
			},
			onChange: function(value) {
				lookupWorkplaces(value);
			},
			load: function(query, callback) {
				if (!query.length) return callback();
				$.ajax({
					url: '/api/employers/search?q=' + encodeURIComponent(query),
					type: 'GET',
					dataType: 'JSON',
					error: function() {
						callback();
					},
					success: function(res) {
						callback(res.result);
					}
				});
			}
		});
	},

	recalculateBand: function(e) {
		var salary = $('.js-salary').val();
		var frequency = $('input[name="salary_frequency"]:checked').val();
		var hoursPerWeek = $('.js-hours-per-week').val();

		var total = 0;

		if (frequency == 'hourly') {
			total = (salary * hoursPerWeek) * 52;
		}
		else if (frequency == 'weekly') {
			total = salary * 52;
		}
		else if (frequency == 'monthly') {
			total = salary * 12;
		}
		else {
			total = salary;
		}

		$.ajax({url: '/api/salary-to-band/' + total}).done(function(response) {
			if (response.success === true) {
				UNISON.StepThree.showCalculation();
				$('.js-subscription-calculation').text(response.result.rate);
			}
		});
	},

	onFrequencyChanged: function(e) {
		var frequency = $('input[name="salary_frequency"]:checked').val();

		if (frequency == 'hourly') {
			$('.js-hours-per-week-container').show();
			$('.js-hours-per-week-container input').attr('data-required', true);
		}
		else {
			$('.js-hours-per-week-container').hide();
			$('.js-hours-per-week-container input').removeAttr('data-required');
		}

		this.recalculateBand();
	},

  // ======================================
  // Create all event listeners
  // ======================================
  createListeners: function() {
  	this.SELECTOR.find('.js-salary,.js-hours-per-week').on('keyup', function(e) { UNISON.StepThree.recalculateBand(); });
  	this.SELECTOR.find('.js-salary-frequency').on('click', function() { UNISON.StepThree.onFrequencyChanged(); });
    this.SELECTOR.find('.currency-input__input').on('input', function(e) { UNISON.StepThree.onCurrencyInput(e); });
    this.SELECTOR.find('.step__form--second-job input').on('change', function(e) { UNISON.StepThree.onSecondaryJobInputChange(e); });
  	this.SELECTOR.find('.js-cant-find-employer').on('click', function(e) { UNISON.StepThree.onManuallyEnterEmployer(e); });
  }
};

UNISON.StepThree.init();