<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Movie;
use DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AnimeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getIndex() {
        if(Auth::user()) {
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->get('https://kitsu.io/api/edge/anime');
            return view('anime.index', array('arrayPeliculas' => DB::table('movies')->orderBy('id', 'asc')->get(), 'result' => $result->getBody()));
        } else {
            return view('auth.login');
        }

        /*if(Auth::user()) {
            $client = new GuzzleHttp\Client();
            $res = $client->get('https://kitsu.io/api/edge/anime');
            $array = json_decode($res->getBody());
            return view('catalog.index', $array);
        } else {
            return view('auth.login');
        }*/

    }

    public function getShow($id) {
        if(Auth::user()) {
            return view('anime.show', array('id' => $id, 'pelicula' => DB::table('movies')->having('id', $id)->orderBy('id', 'asc')->first()));
        } else {
            return view('auth.login');
        }
    }

    public function getCreate() {
        if(Auth::user()) {
            return view('anime.create');
        } else {
            return view('auth.login');
        }
    }

    public function postCreate() {
        if(Auth::user()) {
            $movie = new Movie();

            $movie->title = request()->input('nombre');
            $movie->year = request()->input('anio');
            $movie->director = request()->input('director');
            $movie->poster = request()->input('poster');
            $movie->synopsis = request()->input('resumen');
            $movie->save();

            return view('anime.create');
        } else {
            return view('auth.login');
        }
    }

    public function getEdit($id) {
        if(Auth::user()) {
            return view('anime.edit', array('id' => $id, 'pelicula' => DB::table('movies')->having('id', $id)->orderBy('id', 'asc')->first()));
        } else {
            return view('auth.login');
        }
    }

    public function postEdit($id) {
        if(Auth::user()) {
            $movie = Movie::FindorFail($id);

            $movie->title = request()->input('nombre');
            $movie->year = request()->input('anio');
            $movie->director = request()->input('director');
            $movie->poster = request()->input('poster');
            $movie->synopsis = request()->input('resumen');
            $movie->save();

            $movie = Movie::findOrFail($id);

            return view('anime.show', array('id' => $id, 'pelicula' => $movie));
        } else {
            return view('auth.login');
        }
    }

    public function saveApiData() {
        $client = new Client();
        $res = $client->request('POST', 'https://kitsu.io/api/edge/anime');
        echo $res->getStatusCode();
        // 200
        echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
        // {"type":"User"...'
    }


}