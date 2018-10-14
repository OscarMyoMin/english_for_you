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
                  ->where('mm_word','like','%'.$query.'%')
                  ->where('word_type','like','%'.$query.'%')
                  ->orderBy('id','desc')
                  ->get();
        }else{
          $data = DB::table('words')
                  ->orderBy('id','desc')
                  ->get();
        }
        $total_row = $data->count();
        if($total_row > 0){
          foreach($data as $row){
            $output = $row->en_word;
          }
        }else{
          $output = 'No Data Found';
        }
        $data = array(
          'table_data'=>$output,
          'total_data'=>$total_row,
        );
        echo json_encode($data);
      }
    }
}
