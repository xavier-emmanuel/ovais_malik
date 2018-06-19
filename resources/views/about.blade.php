@extends('layouts.master')

@section('stylesheets')
@endsection
@section('content')
	<section id="about">
    <div class="container">
      <h1 class="text-center">About
        <span>Ovais Malik</span>
      </h1>
      <div class="headul"></div>
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <img src="{{ asset('/img/about-us-image.jpg') }}" alt="About Image" class="img-fluid">
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <p>Ovais Malik is a multilingual voice over talent with a unique flair. He was born in Pakistan and raised in LA,
            which helped cultivate his insatiable appetite for the creative arts, particularly in acting and music.
            <br>
            <br> Trustworthy is one of the first words clients use to describe Ovais' voice. Other words include Believable,
            Versatile, Fresh, Powerful, Authoritative, Sincere, and Guy Next Door.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="niche-studio">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 niche">
          <div class="box">
            <h4>Versality &amp; Niches</h4>
            <div class="headul"></div>
            <p>Being multilingual in English, Hindi, and Urdu has enabled Ovais to become a global voice talent ranging in everything
              from Commercials, Television, Video Games and Animation, to Movie Trailers, Documentaries, Film, Promos, ADR
              and much more.</p>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 studio">
          <div class="box">
            <h4>Studio</h4>
            <div class="headul"></div>
            <ul>
              <li>
                <i class="fas fa-check"></i>&nbsp; Customized Recording Booth</li>
              <li>
                <i class="fas fa-check"></i>&nbsp; ISDN/Phone Patch/Skype</li>
              <li>
                <i class="fas fa-check"></i>&nbsp; MXL Heritage Genesis HE Microphone</li>
              <li>
                <i class="fas fa-check"></i>&nbsp; Custom PC/ Adobe Audition CC</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('scripts')
@endsection