<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function postRequest()
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://kitsu.io/api/edge/anime');
    $response = $response->getBody()->getContents();
    echo '<pre>';
    print_r($response);
}

public function getRequest()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://kitsu.io/api/edge/anime');
        $response = $request->getBody()->getContents();
        echo '<pre>';
        print_r($response);
        exit;
    }


}
