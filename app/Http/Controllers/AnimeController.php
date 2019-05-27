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
use App\animefavoritos;

class AnimeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getIndex() {

        $anime = Input::get('anime');

        if(Auth::user()) {

            $client = new Client();

            if($anime=='') {


                $res = $client->get('https://kitsu.io/api/edge/anime?page[limit]=20');

            } else {

                $res = $client->get('https://kitsu.io/api/edge/anime?page[limit]=20&filter[text]=$'.$anime);

            }

            $animeJSON = json_decode($res->getBody());

            return view('anime.index', array('animeJSON' => $animeJSON->data));
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
            $res = $client->get('kitsu.io/api/edge/anime/' . $id . '');

            $animeAct = json_decode($res->getBody());

            return view('anime.show', array('animeAct' => $animeAct->data));
        } else {
            return view('auth.login');
        }
    }

    public function saveFavs($id) {

        if(Auth::user()) {

            $favs = new animefavoritos;

            $client = new Client();
            $res = $client->get('kitsu.io/api/edge/anime/' . $id);

            $t = time();

            $favs->id_animes = $id;
            $favs->id_user = Auth::user()->id;
            $favs->jsonAnime = $res->getBody();
            $favs->created_at = date("Y-m-d",$t);
            $favs->updated_at = date("Y-m-d",$t);
            $favs->save();

            return back();
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

    public function getFavs() {

        if(Auth::user()) {
            $favs = animefavoritos::get()->where('id_user', Auth::user()->id);

            $fav = $favs->map->only(['jsonAnime']);

            return view('anime.favorites', array('favs' => $fav));
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
