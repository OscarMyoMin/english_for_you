@extends('frontend.layout.base')
@section('title','HOME')
@section('page')
<main class="mdl-layout__content">
  <div class="page-content">
    <form action="#">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="sample3">
        <label class="mdl-textfield__label" for="sample3">Search Here</label>
      </div>
    </form>
  </div>
</main>

@endsection
