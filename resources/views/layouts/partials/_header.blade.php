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

  @if(Request::is('blogs/*'))
    <link rel="canonical" href="{{ url()->full() }}">
    <meta property="og:url"             content="{{ url()->full() }}" />
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

  @endif
</head>