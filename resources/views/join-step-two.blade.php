@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">Getting in touch</h1>
        <div class="step__counter">
          <span>Step 2 of 5</span>
        </div>
      </div>
      <form class="step__form standard-form" data-module="StandardForm" method="POST" action="/join-step-two/{{ $application->token }}">
      	{{ csrf_field() }}

      	@if ($application->address_1)
      		<div class="js-has-details"></div>
      	@endif

        <div class="step__form-address">
          <div class="js-address-auto">
            <fieldset class="step__form-fieldset">
              <label for="details-address-auto">Home address</label>
              <div class="step__form-loading-container">
                <input id="details-address-auto" name="details-address-auto" class="step__form-input js-address-auto-input" type="text" placeholder="Start typing the first line of your home address" autocomplete="off" data-url="/address/url/here" 
	                @if (!$application->address_1)
	                	data-required
	                @endif
                >
                <div class="standard-loader"></div>
              </div>
            </fieldset>
          </div>
          <div class="js-address-manual">
          	<p><a href="#" class="js-show-lookup">Search for another address</a></p>

            <fieldset class="step__form-fieldset">
              <label for="details-address-one">Address 1*</label>
              <input id="details-address-one" name="address_1" class="step__form-input required" type="text" placeholder="Address line 1" autocomplete="street-address" value="{{ $application->address_1 }}">
            </fieldset>
            <fieldset class="step__form-fieldset">
              <label for="details-address-two">Address 2</label>
              <input id="details-address-two" name="address_2" class="step__form-input" type="text" placeholder="Address line 2" value="{{ $application->address_2 }}">
            </fieldset>
            <fieldset class="step__form-fieldset">
              <label for="details-address-three">Address 3</label>
              <input id="details-address-three" name="address_3" class="step__form-input" type="text" placeholder="Address line 3" value="{{ $application->address_3 }}">
            </fieldset>
            <fieldset class="step__form-fieldset">
              <label for="details-town-city">Town/City</label>
              <input id="details-town-city" name="town" class="step__form-input required" type="text" placeholder="Town / City" value="{{ $application->town }}">
            </fieldset>
            <fieldset class="step__form-fieldset">
              <label for="details-postcode">Postcode</label>
              <input id="details-postcode" name="postcode" class="step__form-input required" type="text" placeholder="Postcode" value="{{ $application->postcode }}">
            </fieldset>
          </div>
          <a href="#" class="step__form-toggle js-address-toggle" data-manual-message="Enter address manually" data-auto-message="Enter address automatically">Enter address manually</a>
        </div>
        <fieldset class="step__form-fieldset">
          <label for="details-email">Personal email address*</label>
          <input id="details-email" name="email" class="step__form-input" type="text" value="{{ $application->email }}" data-required data-email>
        </fieldset>
        <fieldset class="step__form-fieldset">
          <label for="details-work-email">Work email address</label>
          <input id="details-work-email" name="work_email" class="step__form-input" type="text" placeholder="Enter email" autocomplete="street-address" value="{{ $application->work_email }}" data-email>
          <span class="step__form-footnote">You can choose your contact preferences when your application is complete</span>
        </fieldset>
        @include('snippets.onward-options', ['continueToLabel' => 'Your work', 'finalStage' => false])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 2])
@include('partials.footer')