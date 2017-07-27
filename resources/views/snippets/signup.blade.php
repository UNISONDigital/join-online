<section class="signup">
  <h1 class="signup__message">Get started - it takes less than five minutes to join</h1>
  <form class="standard-form signup__form" action="/begin-application" method="post">
    <fieldset class="signup__fieldset">
      <label for="signup-name" class="signup__label">My first name is: *</label>
      <input id="signup-name" name="first_name" class="signup__input step__form-input" type="text" placeholder="Enter your  first name" data-required>
    </fieldset>
    <fieldset class="signup__fieldset">
      <label for="signup-email" class="signup__label">UNISON can contact me on: *</label>
      <input id="signup-email" name="email" class="signup__input step__form-input" type="email" placeholder="Enter your email address" data-required>
    </fieldset>
    <fieldset class="signup__fieldset signup__fieldset-submit">
      <input class="signup__submit" type="submit" value="Join now">
    </fieldset>

    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}" />
  </form>
  <div class="signup__note">
    <p>* required fields</p>
  </div>
  @if ($showPhoneNumber)
    <div class="signup__contact">
      <p class="signup__contact-phone">or phone <span class="signup__contact-number">0800 171 2194</span></p>
    </div>
  @endif
</section>