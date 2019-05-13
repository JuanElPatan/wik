<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CatalogController;
use DB;
use Illuminate\Support\Facades\Route;


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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome()
    {
        return redirect()->action('AnimeController@getIndex');
    }

    public function getIndexes($request) {
        if($request->option == 'Anime') {
            return redirect()->action('AnimeController@getIndex');
        } else if ($request->option == 'Games') {
            return redirect()->action('GamesController@getIndex');
        } else {
            return null;
        }
    }
}
