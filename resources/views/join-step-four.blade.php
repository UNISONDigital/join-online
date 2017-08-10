@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title">Payment</h1>
        <div class="step__counter">
          <span>Step 4 of 5</span>
        </div>
      </div>
      <form class="step__form standard-form js-step-four" data-module="StandardForm" method="POST" action="/join-step-four/{{ $application->token }}">
      	{{ csrf_field() }}

        <fieldset class="step__form-fieldset step__form--payment-toggle">
          <label>Please take my UNISON subscription:</label>
          <div class="alt-radio" tabindex="0">
            <input 
            	id="payment-salary" 
            	name="payment_method" 
            	class="step__form-input alt-radio__input js-payment-salary js-payment-type" 
            	type="radio" 
            	value="salary"
            	@if ($application->payment_method == 'salary')
            		checked
            	@endif
            	>
            <label for="payment-salary" class="alt-radio__label">
              <div class="alt-radio__radio"><span class="alt-radio__radio-disc"></span></div>
              <div class="alt-radio__copy">
                <p>Directly from my pay</p>
              </div>
            </label>
          </div>
          <div class="alt-radio" tabindex="0">
            <input 
            	id="payment-direct-debit" name="payment_method" 
            	class="step__form-input alt-radio__input js-payment-direct-debit js-payment-type" 
            	type="radio" 
            	value="direct_debit"
            	@if ($application->payment_method == 'direct_debit')
            		checked
            	@endif
            >
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
          <p class="payment__option-paragraph"><strong>Your subscription will be {{ $cost }} per month.</strong></p>
          <p class="payment__option-paragraph">UNISON and your employer have an agreement that allows you to pay your subscription directly through your wages.</p>
          <fieldset class="step__form-fieldset">
            <label for="payment-salary-name">Enter your name below to signify your consent to your subscription being paid in this way:</label>
            <input id="payment-salary-name" name="payroll_consent" class="step__form-input" type="text" placeholder="Enter your name" value="{{ $application->payroll_consent }}" data-required>
          </fieldset>
        </div>
        <div class="payment__direct-debit">
          <p class="payment__option-title">Set up my Direct Debit</p>
          <p class="payment__option-paragraph"><strong>Your subscription will be {{ $cost }} per month.</strong></p>
          <fieldset class="step__form-fieldset">
            <label for="payment-dd-name">Account holder</label>
            <input id="payment-dd-name" name="direct_debit_account_name" class="step__form-input" type="text" placeholder="Enter name of account holder" value="{{ $application->direct_debit_account_name }}">
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="payment-dd-account-number">Account number</label>
            <input id="payment-dd-account-number" name="direct_debit_account_number" class="step__form-input" type="text" placeholder="8 digital account number" value="{{ $application->direct_debit_account_number }}" >
          </fieldset>
          <fieldset class="step__form-fieldset">
            <label for="payment-dd-sort-code">Sort code</label>
            <input id="payment-dd-sort-code" name="direct_debit_sort_code" class="step__form-input step__form-input--sort-code" type="text" placeholder="11-22-33" value="{{ $application->direct_debit_sort_code }}">
            <p class="step__form-error-message" data-error-message="Format needs to be XX-XX-XX or XXXXXX"></p>
          </fieldset>
          <fieldset class="step__form-fieldset step__form--title-input">
            <label for="payment-dd-payment-date">Day of month to take payment:</label>
            <select id="payment-dd-payment-date" name="direct_debit_day_of_month" class="js-selectric step__form-input" data-required data-select>
              <option value="null">Please select...</option>
              @for ($i = 1; $i <= 31; $i++)
              	<option value="{{ $i }}"
              		@if ($application->direct_debit_day_of_month == $i)
              			selected="selected"
              		@endif
              	>{{ $i }}</option>
              @endfor
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