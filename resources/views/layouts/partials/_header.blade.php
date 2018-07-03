<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="{{ asset(App::environment('production') ? '/public/img/favicon.ico' : '/img/favicon.ico') }}" sizes="16x16">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/bootstrap/bootstrap.min.css' : '/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/fontawesome/css/fontawesome-all.min.css' : '/plugins/fontawesome/css/fontawesome-all.min.css') }}">
  <style>
    img:not([src]):not([srcset]) {
			visibility: hidden;
    }
  </style>

  @yield('stylesheets')

  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/css/main.min.css' : '/css/main.min.css') }}">

  <title>Ovais Malik Voiceover | Multilingual Voice Talent - {{ $page }}</title>

  <link rel="canonical" href="{{ url()->full() }}">
  <meta name="description" content="Ovais Malik is a multilingual voice over talent." />
  <meta property="og:url"             content="{{ url()->full() }}" />
  @if(Request::is('blogs/*'))
    <meta property="og:type"            content="article" />
    <meta property="og:title"           content="Ovais Malik Voiceover | Multilingual Voice Talent - {{ $data->title }}" />
    <meta property="og:description"     content="{!! $data->content !!}" />
    <meta property="og:image"           content="{{ url('/public/uploads/admin-blogs/thumbnail/'.$data->image) }}" />
    <meta property="og:image:width"     content="525" />
    <meta property="og:image:height"    content="315" />

    <meta name="twitter:card"           content="summary_large_image" />
    <meta name="twitter:site"           content="@OvaisMalikVO">
    <meta name="twitter:creator"        content="@OvaisMalikVO" />
    <meta name="twitter:title"          content="Ovais Malik Voiceover | Multilingual Voice Talent - {{ $data->title }}" />
    <meta name="twitter:description"    content="{!! $data->content !!}" />
    <meta name="twitter:image"          content="{{ url('/public/uploads/admin-blogs/thumbnail/'.$data->image) }}" />
  @else
    <meta property="og:type"            content="website" />
    <meta property="og:title"           content="Ovais Malik Voiceover | Multilingual Voice Talent" />
    <meta property="og:description"     content="Ovais Malik is a multilingual voice over talent." />
    <meta property="og:image"           content="{{ asset(App::environment('production') ? '/public/img/logo.jpg' : '/img/logo.jpg') }}" />
    <meta property="og:image:width"     content="525" />
    <meta property="og:image:height"    content="315" />

    <meta name="twitter:card"           content="summary_large_image" />
    <meta name="twitter:site"           content="@OvaisMalikVO">
    <meta name="twitter:creator"        content="@OvaisMalikVO" />
    <meta name="twitter:title"          content="Ovais Malik Voiceover | Multilingual Voice Talent" />
    <meta name="twitter:description"    content="Ovais Malik is a multilingual voice over talent." />
    <meta name="twitter:image"          content="{{ asset(App::environment('production') ? '/public/img/logo.jpg' : '/img/logo.jpg') }}" />
  @endif
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121783600-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-121783600-1');
  </script>

</head>