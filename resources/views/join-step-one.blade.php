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
      <form class="step__form standard-form" data-module="StandardForm" action="/join-step-two">
        <fieldset class="step__form-fieldset step__form--title-input">
          <label for="about-title">Title</label>
          <select id="about-title" class="js-selectric" data-required data-select>
            <option value="null">Please select...</option>
            <option value="about-mr">Mr</option>
            <option value="about-mrs">Mrs</option>
            <option value="about-miss">Miss</option>
            <option value="about-ms">Ms</option>
          </select>
        </fieldset>
        <div class="step__form--two-up">
          <fieldset class="step__form-fieldset">
            <label for="about-fname">First name</label>
            <input id="about-fname" name="fname" class="step__form-input js-membership-card-input-fname" type="text" placeholder="Enter first name" data-required>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-lname">Last name</label>
            <input id="about-lname" name="lname" class="step__form-input js-membership-card-input-lname" type="text" placeholder="Enter last name" data-required>
          </fieldset>
        </div>
        <div class="step__form--dob">
          <p class="step__form--explainer-title">Date of birth</p>
          <p class="step__form--explainer">For example: 20 / 8 / 1978</p>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-dd">Day</label>
            <input id="about-dob-dd" name="about-dob-dd" class="step__form-input" type="number" placeholder="20" step="1" min="1" max="31" data-required>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-mm">Month</label>
            <input id="about-dob-mm" name="about-dob-mm" class="step__form-input" type="number" placeholder="08" step="1" min="1" max="12" data-required>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-yyyy">Year</label>
            <input id="about-dob-yyyy" name="about-dob-yyyy" class="step__form-input" type="number" placeholder="1978" data-required>
          </fieldset>
        </div>
        <div class="step__form--ni">
          <p class="step__form--explainer-title">National insurance number (optional)</p>
          <p class="step__form--explainer">Found on your National Insurance card, a payslip or P60 form. We use this to check if you’ve previously been a member of Unison.</p>
          <fieldset class="step__form-fieldset">
            <input id="about-ni" name="ni" class="step__form-input" type="text" placeholder="AA112233J" data-required data-ni>
          </fieldset>
        </div>
        @include('snippets.onward-options', ['continueToLabel' => 'Getting in touch', 'finalStage' => false])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 1])
@include('partials.footer')