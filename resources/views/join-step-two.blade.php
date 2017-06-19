@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">Getting in touch</h1>
        <div class="step__counter">
          <span>Step 2 of 5</span>
        </div>
      </div>
      <form class="step__form standard-form" data-module="StandardForm">
        <div class="step__form-address">
          <div class="js-address-auto">
            <fieldset class="step__form-fieldset">
              <label for="details-address-auto">Home address</label>
              <div class="step__form-loading-container">
                <input id="details-address-auto" name="details-address-auto" class="step__form-input js-address-auto-input" type="text" placeholder="Start typing the first line of your home address" autocomplete="off" data-url="/address/url/here" data-required>
                <div class="standard-loader"></div>
              </div>
              <div class="js-address-auto-results">
                <ul class="js-address-results-listing">
                  <li class="js-address-results-listing-item">Result 1</li>
                  <li>Result 2</li>
                  <li>Result 3</li>
                  <li>Result 4</li>
                  <li>Result 5</li>
                  <li>Result 1</li>
                  <li>Result 2</li>
                  <li>Result 3</li>
                  <li>Result 4</li>
                  <li>Result 5</li>
                  <li>Result 1</li>
                  <li>Result 2</li>
                  <li>Result 3</li>
                  <li>Result 4</li>
                  <li>Result 5</li>
                  <li>Result 1</li>
                  <li>Result 2</li>
                  <li>Result 3</li>
                  <li>Result 4</li>
                  <li>Result 5</li>
                  <li>Result 1</li>
                  <li>Result 2</li>
                  <li>Result 3</li>
                  <li>Result 4</li>
                  <li>Result 5</li>
                  <li>Result 1</li>
                  <li>Result 2</li>
                  <li>Result 3</li>
                  <li>Result 4</li>
                  <li>Result 5</li>
                </ul>
              </div>
            </fieldset>
          </div>
          <div class="js-address-manual">
            <fieldset class="step__form-fieldset">
              <label for="details-address-one">Address 1*</label>
              <input id="details-address-one" name="details-address-one" class="step__form-input" type="text" placeholder="Address line 1" autocomplete="street-address">
            </fieldset>
            <fieldset class="step__form-fieldset">
              <label for="details-address-two">Address 2</label>
              <input id="details-address-two" name="details-address-two" class="step__form-input" type="text" placeholder="Address line 2">
            </fieldset>
            <fieldset class="step__form-fieldset">
              <label for="details-town-city">Town/City</label>
              <input id="details-town-city" name="details-town-city" class="step__form-input" type="text" placeholder="Town / City">
            </fieldset>
            <fieldset class="step__form-fieldset">
              <label for="details-postcode">Postcode</label>
              <input id="details-postcode" name="details-postcode" class="step__form-input" type="text" placeholder="Postcode">
            </fieldset>
          </div>
          <a href="#" class="step__form-toggle js-address-toggle" data-manual-message="Enter address manually" data-auto-message="Enter address automatically">Enter address manually</a>
        </div>
        <fieldset class="step__form-fieldset">
          <label for="details-email">Personal email address*</label>
          <input id="details-email" name="details-email" class="step__form-input" type="text" value="{{'prefilled email'}}" data-required data-email>
        </fieldset>
        <fieldset class="step__form-fieldset">
          <label for="details-work-email">Work email address*</label>
          <input id="details-work-email" name="details-work-email" class="step__form-input" type="text" placeholder="Enter email" autocomplete="street-address" data-required data-email>
          <span class="step__form-footnote">You can choose your contact preferences when your application is complete</span>
        </fieldset>
        @include('snippets.onward-options', ['continueToLabel' => 'Your work', 'finalStage' => false])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 2])
@include('partials.footer')