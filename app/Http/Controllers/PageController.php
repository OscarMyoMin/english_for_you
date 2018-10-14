<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;

class PageController extends Controller
{
    public function index(){
      $word = Word::limit(10)->get();
      return view('frontend.index',compact('word'));
    }
}
