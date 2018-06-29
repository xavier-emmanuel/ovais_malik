<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="{{ asset(App::environment('production') ? '/public/img/favicon.ico' : '/img/favicon.ico') }}" sizes="16x16">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/bootstrap/bootstrap.min.css' : '/plugins/bootstrap/bootstrap.min.css') }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/plugins/fontawesome/css/fontawesome-all.min.css' : '/plugins/fontawesome/css/fontawesome-all.min.css') }}">

  @yield('stylesheets')

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/css/main.min.css' : '/css/main.min.css') }}">

  <title>Ovais Malik Voiceover | Multilingual Voice Talent - {{ $page }}</title>

  <link rel="canonical" href="{{ url()->full() }}">
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
    <meta property="og:description"     content="Ovais Malik is a multilingual voice over talent with a unique flair. He was born in Pakistan and raised in LA, which helped cultivate his insatiable appetite for the creative arts, particularly in acting and music. " />
    <meta property="og:image"           content="{{ asset(App::environment('production') ? '/public/img/logo.jpg' : '/img/logo.jpg') }}" />
    <meta property="og:image:width"     content="525" />
    <meta property="og:image:height"    content="315" />

    <meta name="twitter:card"           content="summary_large_image" />
    <meta name="twitter:site"           content="@OvaisMalikVO">
    <meta name="twitter:creator"        content="@OvaisMalikVO" />
    <meta name="twitter:title"          content="Ovais Malik Voiceover | Multilingual Voice Talent" />
    <meta name="twitter:description"    content="Ovais Malik is a multilingual voice over talent with a unique flair. He was born in Pakistan and raised in LA, which helped cultivate his insatiable appetite for the creative arts, particularly in acting and music. " />
    <meta name="twitter:image"          content="{{ asset(App::environment('production') ? '/public/img/logo.jpg' : '/img/logo.jpg') }}" />
  @endif
</head>