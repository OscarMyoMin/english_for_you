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
        <input class="mdl-textfield__input" type="text" id="search" style="color:#fff;">
        <label class="mdl-textfield__label" for="search">Enter your query...</label>
      </div>
    </div>
    <p style="color:#fff;">Total Worlds : <span id="total_records"></span></p>
  </center>
</div>
<main class="demo-main mdl-layout__content">
  <div class="demo-container mdl-grid">
    <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
      <div class="demo-crumbs mdl-color-text--grey-500">
        <ul class="demo-list-three mdl-list" id="word_list">

        </ul>

      </div>
    </div>
  </div>
</main>

<dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Allow data collection?</h4>
    <div class="mdl-dialog__content">
      <p>
        Allowing us to collect data will let us get you the information you want faster.
      </p>
    </div>
    <div class="mdl-dialog__actions">
      <button type="button" class="mdl-button">Agree</button>
      <button type="button" class="mdl-button close">Disagree</button>
    </div>
  </dialog>
  <script>
    var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-dialog');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    showDialogButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
  </script>

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

          $('#word_list').html(data.table_data);
          $('#total_records').text(data.total_data);
        }
      }).responseJSON;
    }
    $(document).on('keyup', '#search', function(){
      $query = $(this).val();
      fetch_data($query);
     });
  });
</script>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
@endsection
