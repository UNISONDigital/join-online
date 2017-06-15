<aside class="sidebar">
  <div class="sidebar__membership-card">
    @include('snippets.membership-card')
  </div>
  <div class="sidebar__step-indicator">
    <p class="sidebar__step-message">Five steps to getting your card:</p>
    <ul class="sidebar__steps">
      <li class="sidebar__step {{ $activeStepId === 1 ? "sidebar__step--active" : "" }}">
        <span class="sidebar__step-disc"><span class="sidebar__step-number">1</span></span>
        <span class="sidebar__step-label">About you</span>
      </li>
      <li class="sidebar__step {{ $activeStepId === 2 ? "sidebar__step--active" : "" }}">
        <span class="sidebar__step-disc"><span class="sidebar__step-number">2</span></span>
        <span class="sidebar__step-label">Getting in touch</span>
      </li>
      <li class="sidebar__step {{ $activeStepId === 3 ? "sidebar__step--active" : "" }}">
        <span class="sidebar__step-disc"><span class="sidebar__step-number">3</span></span>
        <span class="sidebar__step-label">Your work</span>
      </li>
      <li class="sidebar__step {{ $activeStepId === 4 ? "sidebar__step--active" : "" }}">
        <span class="sidebar__step-disc"><span class="sidebar__step-number">4</span></span>
        <span class="sidebar__step-label">Payment</span>
      </li>
      <li class="sidebar__step {{ $activeStepId === 5 ? "sidebar__step--active" : "" }}">
        <span class="sidebar__step-disc"><span class="sidebar__step-number">5</span></span>
        <span class="sidebar__step-label">Get your card in the post</span>
      </li>
    </ul>
  </div>
</aside>