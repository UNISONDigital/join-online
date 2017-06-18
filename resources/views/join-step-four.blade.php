@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">Payment</h1>
        <div class="step__counter">
          <span>Step 4 of 5</span>
        </div>
      </div>
      <form class="step__form standard-form js-step-four">
        <fieldset class="step__form-fieldset step__form--payment-toggle">
          <label>Please take my UNISON subscription:</label>
          <div class="alt-radio" tabindex="0">
            <input id="payment-salary" name="payment" class="step__form-input alt-radio__input" type="radio" value="salary" checked>
            <label for="payment-salary" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Directly from my pay</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="payment-direct-debit" name="payment" class="step__form-input alt-radio__input" type="radio" value="direct-debit">
            <label for="payment-direct-debit" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>By Direct Debit</p>
              </div>
            </label>
          </div>
        </fieldset>
        <div class="payment__salary">
          <p class="payment__option-title">Set up payroll deductions</p>
          <p class="payment__option-paragraph"><strong>Your subscription will be &pound;X.XX per month.</strong></p>
          <p class="payment__option-paragraph">UNISON and your employer have an agreement that allows you to pay your subscription directly through your wages.</p>
          <fieldset class="step__form-fieldset">
            <label for="payment-salary-name">Enter your name below to signify your consent to your subscription being paid in this way:</label>
            <input id="payment-salary-name" name="payment-salary-name" class="step__form-input" type="text" placeholder="Enter your name">
          </fieldset>
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
        </div>
        <div class="payment__direct-debit">
          <p class="payment__option-title">Set up my Direct Debit</p>
          <p class="payment__option-paragraph"><strong>Your subscription will be &pound;X.XX per month.</strong></p>
          <fieldset class="step__form-fieldset">
            <label for="payment-dd-name">Account holder</label>
            <input id="payment-dd-name" name="payment-dd-name" class="step__form-input" type="text" placeholder="Enter name of account holder">
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="payment-dd-account-number">Account number</label>
            <input id="payment-dd-account-number" name="payment-dd-account-number" class="step__form-input" type="text" placeholder="8 digital account number">
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="payment-dd-sort-code">Sort code</label>
            <input id="payment-dd-sort-code" name="payment-dd-sort-code" class="step__form-input" type="text" placeholder="00-00-00">
          </fieldset>
          <fieldset class="step__form-fieldset step__form--title-input">
            <label for="payment-dd-payment-date">Day of month to take payment:</label>
            <select id="payment-dd-payment-date" class="js-selectric" data-required>
              <option value="1">1st</option>
              <option value="2">2nd</option>
              <option value="3">3rd</option>
              <option value="4">4th</option>
              <option value="5">5th</option>
              <option value="6">6th</option>
              <option value="7">7th</option>
              <option value="8">8th</option>
              <option value="9">9th</option>
              <option value="10">10th</option>
              <option value="11">11th</option>
              <option value="12">12th</option>
              <option value="13">13th</option>
              <option value="14">14th</option>
              <option value="15">15th</option>
              <option value="16">16th</option>
              <option value="17">17th</option>
              <option value="18">18th</option>
              <option value="19">19th</option>
              <option value="20">20th</option>
              <option value="21">21st</option>
              <option value="22">22nd</option>
              <option value="23">23rd</option>
              <option value="24">24th</option>
              <option value="25">25th</option>
              <option value="26">26th</option>
              <option value="27">27th</option>
              <option value="28">28th</option>
              <option value="29">29th</option>
              <option value="30">30th</option>
              <option value="31">31st</option>
            </select>
          </fieldset>
          <div class="step__form-link">
            <a href="#">Read the Direct Debit terms and conditions</a>
          </div>
        </div>
        @include('snippets.onward-options', ['continueToLabel' => 'Get your membership card', 'finalStage' => true])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 4])
@include('partials.footer')