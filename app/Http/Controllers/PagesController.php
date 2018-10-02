<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $portfolios = Portfolio::orderBy('created_at', 'asc');
        return view('index')->with('portfolios', $portfolios);
    }


    public function work(){
        $portfolios = Portfolio::orderBy('created_at', 'asc')->paginate(6);
        return view('work')->with('portfolios', $portfolios);
    }

    public function workdetails($id){
        $portfolio = Portfolio::find($id);
        return view('show')->with('portfolio', $portfolio);
    }

    public function services(){
        return view('services');
    }

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }
}
