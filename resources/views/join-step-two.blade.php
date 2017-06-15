@include('partials.header')
  <section class="step">
    <div class="step__content">
      <div class="step__header">
        <h1 class="step__header-title"></h1>
        <div class="step__counter">
          <span>Step 2 of 5</span>
        </div>
      </div>
      <form class="step__form standard-form">
        
        @include('snippets.onward-options', ['continueToLabel' => 'Your work'])
      </form>
    </div>
  </section>
  @include('partials.sidebar', ['activeStepId' => 2])
@include('partials.footer')