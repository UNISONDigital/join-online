<div class="information-block">
  <div class="information-block__inner">
    <div class="information-block__title">{{ $title }}</div>
    <div class="information-block__points">
      <div class="information-block__image" style="background-image: url({{ $image }})"></div>
      <ul class="information-block__items">
        @foreach ($points as $point)
          <li class="information-block__item">{{ $point }}</li> 
        @endforeach
      </ul>
    </div>
  </div>
</div>