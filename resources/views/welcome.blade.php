@include('partials.header')
	@include('snippets.image-block')
  @include('snippets.signup', ['showPhoneNumber' => false])
  <section class="information-points">
    <h1 class="information-points__title">Our membership offer to you</h1>
    <h2 class="information-points__subtitle">From today, you'll get:</h2>
    <div class="information-blocks">
      <div class="information-blocks__row">
        @include('snippets.information-block')
        @include('snippets.information-block')
      </div>
      <div class="information-blocks__row">
        @include('snippets.information-block')
        @include('snippets.information-block')
      </div>
      <div class="information-blocks__row information-blocks__row--single">
        @include('snippets.information-block')
      </div>
    </div>
  </section>
  <section class="information-points">
    <h2 class="information-points__subtitle">Four weeks from now you'll get:</h2>
    <div class="information-blocks">
      <div class="information-blocks__row">
        @include('snippets.information-block')
        @include('snippets.information-block')
      </div>
    </div>
  </section>
  <section class="information-points information-points--layout-exception">
    <div class="information-blocks__headings">
      <div class="information-blocks__heading">
        <h2 class="information-points__subtitle">Who can join?</h2>
      </div>
      <div class="information-blocks__heading">
        <h2 class="information-points__subtitle">What you'll pay</h2>
      </div>
    </div>
    <div class="information-blocks">
      <div class="information-blocks__row">
        <h2 class="information-points__subtitle">Who can join?</h2>
        @include('snippets.information-block')
        <h2 class="information-points__subtitle">What you'll pay</h2>
        @include('snippets.information-block')
      </div>
    </div>
  </section>
  @include('snippets.signup', ['showPhoneNumber' => true])
@include('partials.footer')