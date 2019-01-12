<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Similarity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $similarity = new Similarity('bAcA','VaCa');
        $response = $similarity->getPercentage();
        dd($similarity);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }




}
