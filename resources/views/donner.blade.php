@extends('layouts.master')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/css/donner.css')}}" rel="stylesheet">
</head>
@section("content")
<section id="donner" class="d-flex align-items-center">
  <div class="left" style="width: 800px;margin-right: 100px">
      <h1>{{ __('site.donation_requirements_title') }}</h1>
      <h2>{{ __('site.donation_requirements_description') }}</h2>
      <h3>{{ __('site.blood_donation') }}</h3>
      <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> {{ __('site.donation_frequency') }}: {{ __('site.donation_frequency_value') }}</h4>
      <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> {{ __('site.good_health_condition') }}</h4>
      <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> {{ __('site.minimum_age') }}: {{ __('site.minimum_age_value') }}</h4>
      <h4><i class="fa-solid fa-angle-right fa-xs" style="color: #1e3050;"></i> {{ __('site.minimum_weight') }}: {{ __('site.minimum_weight_value') }}</h4>
      <h2>{!! nl2br(__('site.eligibility_questions')) !!} </h2>

      <a href="#about" class="btn-get-started scrollto">{{ __('site.learn_more') }}</a>
      @if(Auth::check())
          <a href="{{ route('donner_sang') }}" class="btn-get-started1 scrollto">{{ __('site.donate_blood') }}</a>
      @else
          <a href="{{ route('login') }}" class="btn-get-started1 scrollto">{{ __('site.login') }}</a>
      @endif
  </div>

  <div class="right">
      <img class="image" src="{{asset('public/img/donner.jpg')}}" alt="Image">
  </div>
</section>

@endsection