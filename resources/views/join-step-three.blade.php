@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">Your work</h1>
        <div class="step__counter">
          <span>Step 3 of 5</span>
        </div>
      </div>
      <form class="step__form standard-form js-step-three" data-module="StandardForm" method="POST" action="/join-step-three/{{ $application->token }}">
      	{{ csrf_field() }}

        <fieldset class="step__form-fieldset js-automatic-employer">
          <label>Select your employer by entering their name below:</label>
          <input name="employer_id" class="js-employer" data-required />

        	<a class="js-cant-find-employer" href="#">Can't find your employer in the list?</a>

	        <fieldset class="step__form-fieldset js-workplaces" style="display: none;">
	          <label>Matches we've found for your workplace:</label>
	          <div class="alt-radio js-workplace-template" tabindex="0" style="display: none;">
	            <input id="work-workplace-1" name="workplace_id" class="step__form-input alt-radio__input" type="radio" value="" checked data-required>
	            <label for="work-workplace-1" class="alt-radio__label">
	              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
	              <div class="alt-radio__copy">
	                <p class="js-workplace-address">...</p>
	                <p class="js-workplace-type"></p>
	              </div>
	            </label>
	          </div>
	        </fieldset>
        </fieldset>

        <fieldset class="step__form-fieldset js-manual-employer" style="display: none;">
        	<label>Or enter your employer's name here, if you can't find them:</label>
          <input 
          	id="employer-name" name="employer" 
          	class="step__form-input js-employer-name" 
          	type="text" 
          	placeholder="Your employer's name" 
          	value="{{ $application->employer }}"
          	@if ($application->employer)
          		data-manual-entry="true"
          	@endif
          	>

          <fieldset class="step__form-fieldset">
            <label>Your workplace location:</label>
          	<input id="workplace-name" name="workplace" class="step__form-input" type="text" placeholder="Your workplace" value="{{ $application->workplace }}">
          </fieldset>
        </fieldset>

        <fieldset class="step__form-fieldset">
          <label for="work-job-title">Your job title</label>
          <input id="work-job-title" name="job_title" class="step__form-input" type="text" placeholder="Job title" value="{{ $application->job_title }}" data-required>
        </fieldset>
        <fieldset class="step__form-fieldset currency-input js-currency-input">
          <label for="work-salary" class="currency-input__label">What are you paid (before tax and deductions)?</label>
          <p class="step__form-footnote">If the amount varies use an average.</p>
          <div class="currency-input__wrap">
            <div class="currency-input__inner">
              <div class="currency-input__before">&pound;</div>
              <input id="work-salary" name="salary" class="step__form-input currency-input__input js-salary" type="number" placeholder="Amount" value="{{ $application->salary }}" data-required>
              <div class="currency-input__after">.00</div>
            </div>
          </div>
          <p class="step__form-footnote">Every:</p>
          <div class="alt-radio-tabbed__container">
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-1" name="salary_frequency" class="step__form-input alt-radio-tabbed__input js-salary-frequency" type="radio" value="hourly" 
              	@if ($application->salary_frequency == 'hourly')
              		checked
              	@endif
              >
              <label for="work-salary-frequency-1" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Hour</p>
                </div>
              </label>
            </div>
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-2" name="salary_frequency" class="step__form-input alt-radio-tabbed__input js-salary-frequency" type="radio" value="weekly"
              	@if ($application->salary_frequency == 'weekly')
              		checked
              	@endif
              >
              <label for="work-salary-frequency-2" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Week</p>
                </div>
              </label>
            </div>
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-3" name="salary_frequency" class="step__form-input alt-radio-tabbed__input js-salary-frequency" type="radio" value="monthly"
               	@if ($application->salary_frequency == 'monthly')
              		checked
              	@endif
              >
              <label for="work-salary-frequency-3" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Month</p>
                </div>
              </label>
            </div>
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-4" name="salary_frequency" class="step__form-input alt-radio-tabbed__input js-salary-frequency" type="radio" value="yearly"
              	@if ($application->salary_frequency == 'yearly' || !$application->salary_frequency)
              		checked
              	@endif
              >
              <label for="work-salary-frequency-4" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Year</p>
                </div>
              </label>
            </div>
          </div>
        </fieldset>

        <fieldset class="step__form-fieldset">
          <div class="js-hours-per-week-container">
	          <label for="work-salary" class="currency-input__label">How many hours do you work per week?</label>
	          <p class="step__form-footnote">If the amount varies use an average.</p>
	          <div class="currency-input__wrap">
	            <div class="currency-input__inner">
	              <input id="work-hours-per-week" name="hours_per_week" class="step__form-input js-hours-per-week" type="number" placeholder="Hours per week" value="{{ $application->hours_per_week }}" step="0.1"data-required>
	            </div>
	          </div>
	        </div>
	      </fieldset>

	      <fieldset class="step__form-fieldset">
          <div class="currency-display js-currency-display">
            <p class="currency-display__notice">Your UNISON subscription will be <span class="js-subscription-calculation"></span> per month.</p>
          </div>
        </fieldset>

        <!--<fieldset class="step__form-fieldset step__form--second-job">
          <label>Do you have another job?</label>
          <div class="alt-radio" tabindex="0">
            <input id="work-second-job-1" name="work-second-job" class="step__form-input alt-radio__input" type="radio" value="true">
            <label for="work-second-job-1" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Yes</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="work-second-job-2" name="work-second-job" class="step__form-input alt-radio__input" type="radio" value="false" checked>
            <label for="work-second-job-2" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>No</p>
              </div>
            </label>
          </div>
        </fieldset>
        <fieldset class="step__form-fieldset step__form--second-job-extra">
          <label for="work-secondary-job-name">I also work at:</label>
          <input id="work-secondary-job-name" name="work-secondary-job-name" class="step__form-input" type="text" placeholder="Secondary job">
          <button class="step__form--second-job-lookup">Look it up</button>
        </fieldset>-->

        @include('snippets.onward-options', ['continueToLabel' => 'Payment', 'finalStage' => false])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 3])
@include('partials.footer')