<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<title>Title</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/app.css">
	</head>
	<body>
		<main class="site__container">
			<header class="global-header">
				<div class="global-header__banner">
					<h1 class="global-header__extra">Unison - Join Now</h1>
					<p class="global-header__notice">Need help joining? Chat online or call 0800 454 647 (9am - Midnight)</p>
				</div>
			</header>
			<section class="introduction">
				<div class="introduction__block">
					<div class="introduction__logo">
						<img class="introduction__img" src="/images/logo.png" alt="Unison - Join Now">
					</div>
					@if (Request::is('/'))
						<hgroup class="introduction__copy">
							<h1 class="introduction__title">My journey into UNISON membership</h1>
							<h2 class="introduction__byline">Join 1.25 million public service workers already in UNISON. 2,154 people have joined in the last 7 days.</h2>
						</hgroup>
					@endif
				</div>
				{{--
					If on homepage, show membership card here,
					if any other route, we show it in sidebar.
				--}}
				@if (Request::is('/'))
					<div class="introduction__block introduction__block--membership">
					@include('snippets.membership-card')
					</div>
				@endif
			</section>