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
  <meta property="og:url"           content="{{ url()->full() }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{ $data->title }}" />
  <meta property="og:description"   content="{{ $data->content}}" />
  <meta property="og:image"         content="/{{ $data->image }}" />
</head>