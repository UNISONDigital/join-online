@include('partials.header')
	@include('snippets.image-block')
  @include('snippets.signup', ['showPhoneNumber' => false])
  <section class="information-points">
    <h1 class="information-points__title">Our membership offer to you</h1>
    <h2 class="information-points__subtitle">From today, you'll get:</h2>
    <div class="information-blocks">
      <div class="information-blocks__row">
        @include(
          'snippets.information-block',
          [
            'title' => 'Support in your job',
            'points' => [
              'Trained local representatives to advise and give support with problems at work',
              'Advice on health and safety issues',
              'Training in professional development and life skills',
              'Note: UNISON may not be able to offer legal advice and representation for an existing problem at work (see ‘after four weeks membership’ for more information)',
            ],
            'image' => '/images/information-block-test-image.jpg'
          ]
        )
        @include(
          'snippets.information-block',
          [
            'title' => 'Support with your employer',
            'points' => [
              'Trained local representatives to advise and give support with problems at work',
              'Advice on health and safety issues',
              'Training in professional development and life skills',
              'Note: UNISON may not be able to offer legal advice and representation for an existing problem at work (see ‘after four weeks membership’ for more information)',
            ],
            'image' => '/images/information-block-test-image.jpg'
          ]
        )
      </div>
      <div class="information-blocks__row">
        @include(
          'snippets.information-block',
          [
            'title' => 'Benefits and services',
            'points' => [
              'Trained local representatives to advise and give support with problems at work',
              'Advice on health and safety issues',
              'Training in professional development and life skills',
              'Note: UNISON may not be able to offer legal advice and representation for an existing problem at work (see ‘after four weeks membership’ for more information)',
            ],
            'image' => '/images/information-block-test-image.jpg'
          ]
        )
        @include(
          'snippets.information-block',
          [
            'title' => 'Campaigns for public services',
            'points' => [
              'Trained local representatives to advise and give support with problems at work',
              'Advice on health and safety issues',
              'Training in professional development and life skills',
              'Note: UNISON may not be able to offer legal advice and representation for an existing problem at work (see ‘after four weeks membership’ for more information)',
            ],
            'image' => '/images/information-block-test-image.jpg'
          ]
        )
      </div>
    </div>
  </section>
  <section class="information-points">
    <h2 class="information-points__subtitle">Four weeks from now you'll get:</h2>
    <div class="information-blocks">
      <div class="information-blocks__row--single">
        @include(
          'snippets.information-block',
          [
            'title' => 'Free legal advice',
            'points' => [
              'Trained local representatives to advise and give support with problems at work',
              'Advice on health and safety issues',
              'Training in professional development and life skills',
              'Note: UNISON may not be able to offer legal advice and representation for an existing problem at work (see ‘after four weeks membership’ for more information)',
            ],
            'image' => '/images/information-block-test-image.jpg'
          ]
        )
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
        @include(
          'snippets.information-block',
          [
            'title' => 'Anyone in public services',
            'points' => [
              'Trained local representatives to advise and give support with problems at work',
              'Advice on health and safety issues',
              'Training in professional development and life skills',
              'Note: UNISON may not be able to offer legal advice and representation for an existing problem at work (see ‘after four weeks membership’ for more information)',
            ],
            'image' => '/images/information-block-test-image.jpg'
          ]
        )
        <h2 class="information-points__subtitle">What you'll pay</h2>
        @include(
          'snippets.information-block',
          [
            'title' => 'From £1.30 per week',
            'points' => [
              'Trained local representatives to advise and give support with problems at work',
              'Advice on health and safety issues',
              'Training in professional development and life skills',
              'Note: UNISON may not be able to offer legal advice and representation for an existing problem at work (see ‘after four weeks membership’ for more information)',
            ],
            'image' => '/images/information-block-test-image.jpg'
          ]
        )
      </div>
    </div>
  </section>
  @include('snippets.signup', ['showPhoneNumber' => true])
@include('partials.footer')