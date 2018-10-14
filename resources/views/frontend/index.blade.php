@extends('frontend.layout.base')
@section('title','HOME')
@section('page')
<style>
.demo-list-two {
  width: 300px;
}
</style>

<div class="demo-ribbon">
  <center>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable" style="margin-top:60px;">
      <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
        <i class="material-icons" style="color:#fff;">search</i>
      </label>
      <div class="mdl-textfield__expandable-holder">
        <input class="mdl-textfield__input" type="text" name="search" id="search" style="color:#fff;">
        <label class="mdl-textfield__label" for="search">Enter your query...</label>
      </div>
    </div>
    <p style="color:#fff;">Total Worlds : {{$count}} <span id="total_records"></span></p>
  </center>
</div>
<main class="demo-main mdl-layout__content">
  <div class="demo-container mdl-grid">
    <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
      <div class="demo-crumbs mdl-color-text--grey-500">
        <ul class="demo-list-three mdl-list">
          @foreach($word as $row)
          <li class="mdl-list__item mdl-list__item--three-line" id="show-dialog">
            <span class="mdl-list__item-primary-content">
              <input type="hidden" id="speak{{$row->id}}" value="{{$row->en_word}}">
              <span>{{$row->en_word}} <small><i>[{{$row->word_type}}]</i></small> </span>
              <span class="mdl-list__item-text-body">
                {!! mb_substr($row->mm_definition, 0, 50)!!}...
              </span>
            </span>
            <span class="mdl-list__item-secondary-content">
              <a class="mdl-list__item-secondary-action" onclick="textTospeech{{$row->id}}();"><i class="material-icons">volume_up</i></a>
            </span>
            <script type="text/javascript">
              function textTospeech{{$row->id}}(){
                var text = document.getElementById('speak{{$row->id}}').value;
                responsiveVoice.speak(text);

              }
            </script>
          </li>
          @endforeach
        </ul>

      </div>
    </div>
  </div>
</main>

<dialog id="dialog" class="mdl-dialog">
  <h3 class="mdl-dialog__title">MDL Dialog</h3>
  <div class="mdl-dialog__content">
    <p>
      This is an example of the Material Design Lite dialog component.
      Please use responsibly.
    </p>
  </div>
  <div class="mdl-dialog__actions">
    <button type="button" class="mdl-button">Close</button>
    <button type="button" class="mdl-button" disabled>Disabled action</button>
  </div>
</dialog>

<script type="text/javascript">
  $(document).ready(function(){
    fetch_data();
    function fetch_data(query = ''){
      $.ajax({
        url:"{{route('word.search')}}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data){

          $('#total_records').text(data.total_data);
        }
      });
    }
    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_data(query);
     });
  });
</script>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
@endsection
