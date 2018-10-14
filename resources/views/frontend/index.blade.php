@extends('frontend.layout.base')
@section('title','HOME')
@section('page')
<style>
.demo-list-two {
  width: 300px;
}
</style>
<main class="mdl-layout__content">
  <div class="page-content">
    <div class="mdl-grid">
      <div class="mdl-cell mdl-cell--4-col">
        <form action="#">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="sample3">
            <label class="mdl-textfield__label" for="sample3">Search Here</label>
          </div>
        </form>
        <div class="">
          <ul class="demo-list-icon mdl-list">
            @foreach($word as $row)
            <li class="mdl-list__item mdl-list__item--two-line">
              <span class="mdl-list__item-primary-content">
                <i class="material-icons mdl-list__item-icon">volume_up</i>
                <span>{{$row->en_word}}</span>
                <span class="mdl-list__item-sub-title">{{$row->word_type}}</span>
              </span>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="mdl-cell mdl-cell--8-col">
  
        <example-component>

        </example-component>
      </div>
    </div>

  </div>
</main>

@endsection
