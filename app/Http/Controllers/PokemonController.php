<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Controller;
use App\Movie;
use DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PokemonController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getIndex() {

        $pokemon = Input::get('pokemon');

        if(Auth::user()) {

            $client = new Client();
            $res = $client->get('https://api.pokemontcg.io/v1/cards?name='.$pokemon);

            $pokeJSON = json_decode($res->getBody());

            return view('pokemon.index', array('pokeJSON' => $pokeJSON->cards));
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
            $client = new Client();
            $res = $client->get('https://api.pokemontcg.io/v1/cards?id=' . $id);

            $pokeJSON = json_decode($res->getBody());

            return view('pokemon.show', array('pokeJSON' => $pokeJSON->cards[0]));
        } else {
            return view('auth.login');
        }
    }

    public function getCreate() {
        if(Auth::user()) {
            return view('pokemon.create');
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

            return view('pokemon.create');
        } else {
            return view('auth.login');
        }
    }

    public function getEdit($id) {
        if(Auth::user()) {
            return view('pokemon.edit', array('id' => $id, 'pelicula' => DB::table('movies')->having('id', $id)->orderBy('id', 'asc')->first()));
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

            return view('pokemon.show', array('id' => $id, 'pelicula' => $movie));
        } else {
            return view('auth.login');
        }
    }

    public function saveApiData() {
        $client = new Client();
        $res = $client->request('POST', 'https://pokeapi.co/api/v2/pokemon/');
        echo $res->getStatusCode();
        // 200
        echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
        // {"type":"User"...'
    }

}
