<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use DB;

class PageController extends Controller
{
    public function index(){
      $word = Word::limit(10)->get();
      $count = Word::count();
      return view('frontend.index',compact('word','count'));
    }

    public function word_search(Request $request){
      if($request->ajax()){
        $query = $request->get('query');
        if($query != ''){
          $data = DB::table('words')
                  ->where('en_word','like','%'.$query.'%')
                  ->get();
        }else{
          $data = DB::table('words')
                  ->orderBy('id','desc')
                  ->get();
        }
        $total_row = $data->count();
        if($total_row > 0){
          foreach($data as $row){
            $output = '<li class="mdl-list__item mdl-list__item--three-line" id="show-dialog">
            <span class="mdl-list__item-primary-content">
            <input type="hidden" id="speak'.$row->id.'" value="'.$row->en_word.'"><span>
            '.$row->en_word.'<small><i>['.$row->word_type.']</i></small> </span>
            <span class="mdl-list__item-text-body">'.mb_substr($row->mm_definition, 0, 50).'</span></span>
            <span class="mdl-list__item-secondary-content">
            <a class="mdl-list__item-secondary-action" onclick="textTospeech'.$row->id.'();"><i class="material-icons">volume_up</i></a>
            </span>
            <script type="text/javascript">
              function textTospeech'.$row->id.'(){
                var text = document.getElementById(\'speak'.$row->id.'\').value;
                responsiveVoice.speak(text);

              }
            </script></li>';
          }
        }else{
          $output = '<center><div>No Data Found</div></center>';
        }
        $data = array(
          'table_data'=>$output,
          'total_data'=>$total_row,
        );
        echo json_encode($data);
      }
    }
}
