<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ENG @yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="{{asset('js/app.js')}}">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout">
    @include('frontend.layout.nav')

    @yield('page')
    @include('frontend.layout.footer')
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="{{asset('js/inits.js')}}" charset="utf-8"></script>
  </body>
</html>
