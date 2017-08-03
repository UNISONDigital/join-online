@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">Your card is on its way</h1>
        <div class="step__header-arrow">
          <div class="step__header-arrow-head"></div>
        </div>
        <div class="step__counter">
          <span>Step 5 of 5</span>
        </div>
      </div>
      <p class="step__form-title">You are now one of 1.25 million UNISON members. We are stronger together.</p>
      <p class="step__form-paragraph">Your application is being processed. Once this is done you will receive your membership pack through the post (this may take up to two weeks).</p>
      <p class="step__form-paragraph"><strong>You will also receive an email containing more information about your membership shortly.</strong></p>
      <form class="step__form standard-form js-step-five" data-module="StandardForm" method="POST" action="/join-step-five/{{ $application->token }}">
      	{{ csrf_field() }}
      	
        <div class="step__form-selections">
          <p class="step__form-selections-title">1. My communications choice</p>
          <fieldset class="step__form-fieldset">
            <label>I'd prefer to be contacted via:</label>
            <div class="alt-radio" tabindex="0">
              <input id="communications-personal" name="communications_method" class="step__form-input alt-radio__input" type="radio" value="personal"
              	@if ($application->communications_method == 'personal' || !$application->work_email)
              		checked
              	@endif
              >
              <label for="communications-personal" class="alt-radio__label">
                <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
                <div class="alt-radio__copy">
                  <p>My personal email ({{ $application->email }})</p>
                </div>
              </label>
            </div>

            @if ($application->work_email)
	            <div class="alt-radio" tabindex="0">
	              <input id="communications-work" name="communications_method" class="step__form-input alt-radio__input" type="radio" value="work"
	              	@if ($application->communications_method == 'work')
	              		checked
	              	@endif
	              >
	              <label for="communications-work" class="alt-radio__label">
	                <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
	                <div class="alt-radio__copy">
	                  <p>My work email ({{ $application->work_email }})</p>
	                </div>
	              </label>
	            </div>
	          @endif
          </fieldset>
          <fieldset class="step__form-fieldset alt-radio-inline">
            <label>Which UNISON communications would you like to receive? You can change this whenever you wish.</label>
            <div class="alt-radio" tabindex="0">
              <input id="communications-type-basic" name="communications_type" class="step__form-input alt-radio__input" type="radio" value="basic"
              	@if ($application->communications_type == 'basic')
              		checked
              	@endif
              >
              <label for="communications-type-basic" class="alt-radio__label">
                <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
                <div class="alt-radio__copy">
                  <p><strong>Basic</strong></p>
                  <p>Our minimum communications package of letters, email and texts, including: </p>
                  <ul>
                    <li>Our quarterly magazine</li>
                    <li>Voting on UNISON issues</li>
                    <li>Letters we are legally required to send you</li>
                  </ul>
                </div>
              </label>
            </div>
            <div class="alt-radio" tabindex="0">
              <input id="communications-type-standard" name="communications_type" class="step__form-input alt-radio__input" type="radio" value="standard"
              	@if ($application->communications_type == 'standard')
              		checked
              	@endif
              >
              <label for="communications-type-standard" class="alt-radio__label">
                <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
                <div class="alt-radio__copy">
                  <p><strong>Standard</strong></p>
                  <p>Our most popular package includes everything in Basic plus letters, emails and texts about: </p>
                  <ul>
                    <li>Your membership benefits</li>
                    <li>Our campaigns</li>
                    <li>Special offers from our partners</li>
                  </ul>
                </div>
              </label>
            </div>
            <div class="alt-radio" tabindex="0">
              <input id="communications-type-involved" name="communications_type" class="step__form-input alt-radio__input" type="radio" value="involved"
              	@if ($application->communications_type == 'involved')
              		checked
              	@endif
              >
              <label for="communications-type-involved" class="alt-radio__label">
                <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
                <div class="alt-radio__copy">
                  <p><strong>Get involved!</strong></p>
                  <p>Includes the standard package  plus letters, emails  and texts about: </p>
                  <ul>
                    <li>Getting involved in UNISON</li>
                    <li>Supporting our campaigns</li>
                    <li>Our international activity and solidarity campaigns</li>
                  </ul>
                </div>
              </label>
            </div>
          </fieldset>

          <p class="step__form-selections-title">2. My political fund:</p>
          <fieldset class="step__form-fieldset alt-radio-inline">
            <label>UNISON uses the Political Fund to campaign. The Political Fund has two parts and is included in your subscription. Choose which to support:</label>
            <div class="alt-radio" tabindex="0">
              <input id="fund-affiliate" name="fund" class="step__form-input alt-radio__input" type="radio" value="affiliate"
              	@if ($application->fund == 'affiliate')
              		checked
              	@endif
              >
              <label for="fund-affiliate" class="alt-radio__label">
                <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
                <div class="alt-radio__copy">
                  <p><strong>The Affiliate Fund</strong></p>
                  <p>Supports the Labour Party.</p>
                </div>
              </label>
            </div>
            <div class="alt-radio" tabindex="0">
              <input id="fund-general" name="fund" class="step__form-input alt-radio__input" type="radio" value="general"
              	@if ($application->fund == 'general')
              		checked
              	@endif
              >
              <label for="fund-general" class="alt-radio__label">
                <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
                <div class="alt-radio__copy">
                  <p><strong>The General Fund</strong></p>
                  <p>Pays for research, campaigns and lobbying, independent of any political party.</p>
                </div>
              </label>
            </div>
          </fieldset>

          <p class="step__form-selections-title">3. A bit more about me:</p>
          <fieldset class="step__form-fieldset">
            <label for="more-about-gender">I identify my gender as:</label>
            <select id="more-about-gender" class="js-selectric" name="gender" data-required>
              <option>Please select</option>
              @foreach (['Male' => 'male', 'Female' => 'female'] as $name => $value)
              	<option value="{{ $value }}"
              		@if ($application->gender == $value)
              			selected="selected"
              		@endif
              	>{{ $name }}</option>
              @endforeach
            </select>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="more-about-disabled">I identify disabled:</label>
            <select id="more-about-disabled" class="js-selectric" name="disability" data-required>
              <option>Please select</option>
              @foreach (['None' => 'none'] as $name => $value)
              	<option value="{{ $value }}"
              		@if ($application->disability == $value)
              			selected="selected"
              		@endif
              	>{{ $name }}</option>
              @endforeach
            </select>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="more-about-orientation">My sexual orientation:</label>
            <select id="more-about-orientation" class="js-selectric" name="orientation" data-required>
              <option>Please select</option>
              @foreach (['Heterosexual' => 'heterosexual'] as $name => $value)
              	<option value="{{ $value }}"
              		@if ($application->orientation == $value)
              			selected="selected"
              		@endif
              	>{{ $name }}</option>
              @endforeach
            </select>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="more-about-ethnicity">My ethnic origin:</label>
            <select id="more-about-ethnicity" class="js-selectric" name="ethnicity" data-required>
              <option>Please select</option>
              @foreach (['None' => 'none'] as $name => $value)
              	<option value="{{ $value }}"
              		@if ($application->ethnicity == $value)
              			selected="selected"
              		@endif
              	>{{ $name }}</option>
              @endforeach
            </select>
          </fieldset>

          <p class="step__form-selections-title">4. Manage my membership online</p>
          <p>As a member you can login to the ‘MyUNISON’ website to check and manage your membership details.</p>
          <fieldset class="step__form-fieldset">
            <label for="membership-password-1">Password</label>
            <input id="membership-password-1" name="password" class="step__form-input" type="password" placeholder="Password" data-match>
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="membership-password-2">Confirm password</label>
            <input id="membership-password-2" name="password_confirm" class="step__form-input" type="password" placeholder="Password" data-match>
          </fieldset>

          <fieldset class="step__form-fieldset">
            <input class="onward-options__submit" type="submit" value="Submit">
          </fieldset>
        </div>
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 5])
@include('partials.footer')