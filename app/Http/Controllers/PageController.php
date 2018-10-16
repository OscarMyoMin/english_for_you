<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;
use DB;

class PageController extends Controller
{
    public function index(){
      return view('frontend.index');
    }

    public function word_search(Request $request){
      \Debugbar::startMeasure('query_time','start query');

      if($request->ajax()){
        $query = $request->get('query');
        if($query != ''){
          $data = DB::table('words')
                  ->where('en_word','like',$query.'%')
                  ->orWhere('mm_word','like',$query.'%')
                  ->orWhere('mm_definition','like',$query.'%')
                  ->orWhere('en_definition','like',$query.'%')
                  ->orderBy('en_word','asc')
                  ->limit(20)
                  ->get();
        }else{
          $data = DB::table('words')
                  ->orderBy('en_word','asc')
                  ->limit(20)
                  ->get();
        }
        $total_row = $data->count();
        $output = array();
        if($total_row > 0){
          foreach($data as $row){
            $output[] = '<li class="mdl-list__item mdl-list__item--three-line" id="show-dialog" style="cursor: pointer;">
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
          'total_data'=>$total_row
        );
        echo json_encode($data);

        \Debugbar::stopMeasure('query_time');
      }
    }
}
