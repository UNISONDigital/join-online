@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">About me</h1>
        <div class="step__counter">
          <span>Step 1 of 5</span>
        </div>
      </div>
      <p>We need some personal information to get your membership started.</p>
      <p><strong>We won't share that you've joined UNISON with your employer.</strong></p>
      <form class="step__form standard-form" data-module="StandardForm" method="POST" action="/join-step-one/{{ $application->token }}">
      	{{ csrf_field() }}
      	
        <fieldset class="step__form-fieldset step__form--title-input">
          <label for="about-title">Title</label>
          <select id="about-title" class="js-selectric" name="title" data-required data-select>
            <option value="null">Please select...</option>
            <option value="Mr"
            	@if ($application->title == 'Mr')
            		selected
            	@endif
            >Mr</option>
            <option value="Mrs"
            	@if ($application->title == 'Mrs')
            		selected
            	@endif
            >Mrs</option>
            <option value="Miss"
            	@if ($application->title == 'Miss')
            		selected
            	@endif
            >Miss</option>
            <option value="Ms"
            	@if ($application->title == 'Ms')
            		selected
            	@endif
            >Ms</option>
          </select>
        </fieldset>
        <div class="step__form--two-up">
          <fieldset class="step__form-fieldset">
            <label for="about-fname">First name</label>
            <input id="about-fname" name="first_name" class="step__form-input js-first-name" type="text" placeholder="Enter first name" value="{{ $application->first_name }}" data-required>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-lname">Last name</label>
            <input id="about-lname" name="last_name" class="step__form-input js-last-name" type="text" placeholder="Enter last name" value="{{ $application->last_name }}" data-required>
          </fieldset>
        </div>
        <div class="step__form--dob">
          <p class="step__form--explainer-title">Date of birth</p>
          <p class="step__form--explainer">For example: 20 / 8 / 1978</p>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-dd">Day</label>
            <input id="about-dob-dd" name="date_of_birth_day" class="step__form-input" type="number" placeholder="20" step="1" min="1" max="31" value="{{ $date_of_birth_day }}" data-required>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-mm">Month</label>
            <input id="about-dob-mm" name="date_of_birth_month" class="step__form-input" type="number" placeholder="08" step="1" min="1" max="12" value="{{ $date_of_birth_month }}" data-required>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-yyyy">Year</label>
            <input id="about-dob-yyyy" name="date_of_birth_year" class="step__form-input" type="number" placeholder="1978" value="{{ $date_of_birth_year }}" data-required>
          </fieldset>
        </div>
        <div class="step__form--ni">
          <p class="step__form--explainer-title">National insurance number (optional)</p>
          <p class="step__form--explainer">Found on your National Insurance card, a payslip or P60 form. We use this to check if you’ve previously been a member of Unison.</p>
          <fieldset class="step__form-fieldset">
            <input id="about-ni" name="national_insurance" class="step__form-input" type="text" placeholder="AA112233J" value="{{ $application->national_insurance }}" data-ni>
          </fieldset>
        </div>
        @include('snippets.onward-options', ['continueToLabel' => 'Getting in touch', 'finalStage' => false])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 1])
@include('partials.footer')