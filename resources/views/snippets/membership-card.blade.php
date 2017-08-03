<div class="membership-card">
  <div class="membership-card__visual">
    <div class="membership-card__visual--top"></div>
    <div class="membership-card__visual--bottom"></div>
  </div>
  <div class="membership-card__copy">
    <div class="membership-card__title">
      <span>UNISON Member</span>
    </div>
    <div class="membership-card__name js-membership-card-name">
      <span class="js-membership-card-fullname">
        <span class="js-membership-card-fname">{{ $application->getFirstName() }}</span> <span class="js-membership-card-lname">{{ $application->getLastName() }}</span>
      </span>
    </div>
  </div>
  <div class="membership-card__logo">
    <img class="introduction__img" src="/images/logo.png" alt="Unison - Join Now">
  </div>
</div>