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
      <form class="step__form standard-form">
        <fieldset class="step__form-fieldset step__form--title-input">
          <label>Title</label>
          <select class="js-selectric" data-required>
            <option>Please select...</option>
            <option value="about-mr">Mr</option>
            <option value="about-mrs">Mrs</option>
            <option value="about-miss">Miss</option>
            <option value="about-ms">Ms</option>
          </select>
        </fieldset>
        <div class="step__form--two-up">
          <fieldset class="step__form-fieldset">
            <label for="about-fname">First name</label>
            <input id="about-fname" name="fname" class="step__form-input" type="text" placeholder="Enter first name">
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-lname">Last name</label>
            <input id="about-lname" name="lname" class="step__form-input" type="text" placeholder="Enter last name">
          </fieldset>
        </div>
        <div class="step__form--dob">
          <p class="step__form--explainer-title">Date of birth</p>
          <p class="step__form--explainer">For example: 20 / 8 / 1978</p>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-dd">Day</label>
            <input id="about-dob-dd" name="about-dob-dd" class="step__form-input" type="text" placeholder="20">
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-mm">Month</label>
            <input id="about-dob-mm" name="about-dob-mm" class="step__form-input" type="text" placeholder="08">
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="about-dob-yyyy">Year</label>
            <input id="about-dob-yyyy" name="about-dob-yyyy" class="step__form-input" type="text" placeholder="1978">
          </fieldset>
        </div>
        <div class="step__form--ni">
          <p class="step__form--explainer-title">National insurance number (optional)</p>
          <p class="step__form--explainer">Found on your National Insurance card, a payslip or P60 form. We use this to check if you’ve previously been a member of Unison.</p>
          <fieldset class="step__form-fieldset">
            <input id="about-ni" name="ni" class="step__form-input" type="text" placeholder="AA 11 22 33 J">
          </fieldset>
        </div>
        <div class="step__form-onward-options">
          <fieldset class="step__form-fieldset">
            <input class="step__form-submit" type="submit" value="Continue to 'Getting in touch'">
          </fieldset>
          <p class="step__form-onward-options--seperator">or</p>
          <fieldset class="step__form-fieldset">
            <input class="step__form-submit" type="submit" value="Finish your application later">
          </fieldset>
          <div class="step__form--explainer">
            <p>We'll email you:</p>
            <ul>
              <li>A link to this form</li>
              <li>Your membership number, which will also be your temporary password</li>
            </ul>
          </div>
        </div>
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 1])
@include('partials.footer')