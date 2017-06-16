@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">Your work</h1>
        <div class="step__counter">
          <span>Step 3 of 5</span>
        </div>
      </div>
      <form class="step__form standard-form">
        <fieldset class="step__form-fieldset">
          <label>Matches we've found for your workplace:</label>
          <div class="alt-radio" tabindex="0">
            <input id="work-workplace-1" name="work-workplace" class="step__form-input alt-radio__input" type="radio" checked>
            <label for="work-workplace-1" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Nulla vitae elit libero, a pharetra augue.</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="work-workplace-2" name="work-workplace" class="step__form-input alt-radio__input" type="radio">
            <label for="work-workplace-2" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Value 2</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="work-workplace-3" name="work-workplace" class="step__form-input alt-radio__input" type="radio">
            <label for="work-workplace-3" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p><strong>Value 3</strong></p>
                <p>Our minimum communications package of letters, email and texts, including: </p>
                <ul>
                  <li>Our quarterly magazine</li>
                  <li>Voting on UNISON issues</li>
                  <li>Letters we are legally required to send you.</li>
                </ul>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="work-workplace-4" name="work-workplace" class="step__form-input alt-radio__input" type="radio">
            <label for="work-workplace-4" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Value 4</p>
              </div>
            </label>
          </div>
        </fieldset>
        <fieldset class="step__form-fieldset">
          <label>Select your employer:</label>
          <div class="alt-radio" tabindex="0">
            <input id="work-employer-1" name="work-employer" class="step__form-input alt-radio__input" type="radio" checked>
            <label for="work-employer-1" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Employer 1</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="work-employer-2" name="work-employer" class="step__form-input alt-radio__input" type="radio">
            <label for="work-employer-2" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Employer 2</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="work-employer-3" name="work-employer" class="step__form-input alt-radio__input" type="radio">
            <label for="work-employer-3" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Employer 3</p>
              </div>
            </label>
          </div>
        </fieldset>
        <fieldset class="step__form-fieldset">
          <label for="work-job-title">Your job title</label>
          <input id="work-job-title" name="work-job-title" class="step__form-input" type="text" placeholder="Job title" data-required>
        </fieldset>
        <fieldset class="step__form-fieldset currency-input">
          <label for="work-salary" class="currency-input__label">What are you paid (before tax and deductions)?</label>
          <p class="step__form-footnote">If the amount varies use an average.</p>
          <div class="currency-input__wrap">
            <div class="currency-input__inner">
              <div class="currency-input__before">&pound;</div>
              <input id="work-salary" name="work-salary" class="step__form-input currency-input__input" type="number" placeholder="Amount" data-required>
              <div class="currency-input__after">.00</div>
            </div>
          </div>
          <p class="step__form-footnote">Every:</p>
          <div class="alt-radio-tabbed__container">
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-1" name="work-salary-frequency" class="step__form-input alt-radio-tabbed__input" type="radio">
              <label for="work-salary-frequency-1" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Hour</p>
                </div>
              </label>
            </div>
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-2" name="work-salary-frequency" class="step__form-input alt-radio-tabbed__input" type="radio">
              <label for="work-salary-frequency-2" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Week</p>
                </div>
              </label>
            </div>
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-3" name="work-salary-frequency" class="step__form-input alt-radio-tabbed__input" type="radio">
              <label for="work-salary-frequency-3" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Month</p>
                </div>
              </label>
            </div>
            <div class="alt-radio-tabbed" tabindex="0">
              <input id="work-salary-frequency-4" name="work-salary-frequency" class="step__form-input alt-radio-tabbed__input" type="radio">
              <label for="work-salary-frequency-4" class="alt-radio-tabbed__label">
                <div class="alt-radio-tabbed__copy">
                  <p>Year</p>
                </div>
              </label>
            </div>
          </div>
        </fieldset>
        <fieldset class="step__form-fieldset step__form--second-job">
          <label>Do you have another job?</label>
          <div class="alt-radio" tabindex="0">
            <input id="work-second-job-1" name="work-second-job" class="step__form-input alt-radio__input" type="radio" checked>
            <label for="work-second-job-1" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Yes</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input id="work-second-job-2" name="work-second-job" class="step__form-input alt-radio__input" type="radio">
            <label for="work-second-job-2" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>No</p>
              </div>
            </label>
          </div>
        </fieldset>
        @include('snippets.onward-options', ['continueToLabel' => 'Payment'])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 2])
@include('partials.footer')