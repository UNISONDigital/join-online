<section class="signup">
  <h1 class="signup__message">Get started - it takes less than five minutes to join</h1>
  <form class="standard-form signup__form">
    <fieldset class="signup__fieldset">
      <label for="name" class="signup__label">My name is:</label>
      <input id="name" class="signup__input" type="text" placeholder="Enter your name" data-required>
    </fieldset>
    <fieldset class="signup__fieldset">
      <label for="workplace" class="signup__label">I work at:</label>
      <input id="workplace" class="signup__input" type="text" placeholder="Your workplace" data-required>
    </fieldset>
    <fieldset class="signup__fieldset">
      <label for="email" class="signup__label">UNISON can contact me on:</label>
      <input id="email" class="signup__input" type="email" placeholder="Enter your email address" data-required>
    </fieldset>
    <fieldset class="signup__fieldset signup__fieldset-submit">
      <input class="signup__submit" type="submit" value="Join now">
    </fieldset>
  </form>
  @if ($showPhoneNumber)
    <div class="signup__contact">
      <p class="signup__contact-phone">or phone <span class="signup__contact-number">0800 171 2194</span></p>
    </div>
  @endif
</section>