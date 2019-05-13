    @extends('layouts.master')
@section('content')

@php

    $client = new GuzzleHttp\Client();
    $res = $client->get('kitsu.io/api/edge/anime');
    //echo $res->getStatusCode();
    //echo $res->getHeader('content-type')[0];

    $animeJSON = json_decode($res->getBody());

    //echo $animeJSON->data[0]->id

@endphp

<h2 style="color: black;">Catalogo</h2>

<hr/>

{{ dump($result) }}


@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <div class="row">

        @foreach( $arrayPeliculas as $key => $anime )
            <div class="card">
                    @if (asset($anime->poster))
                        <img src="{{$animeJSON->data[0]->attributes->posterImage->large}}" id="img-{{$animeJSON->data[0]->id}}" style="height:400px"/>
                    @else
                        <img src="{{asset("img/err.jpg")}}" id="img-err"/>
                    @endif
                    <div class="card-body">
                    <h5 class="card-title">{{$animeJSON->data[0]->attributes->titles->en}}</h5>
                    <p class="card-text">{{$animeJSON->data[0]->attributes->synopsis}}</p>

                    <a href="{{ url('/catalog/show/' . $animeJSON->data[0]->id ) }}">Link</a>
                </div>
            </div>


                <div class="card">

                </div>

        @endforeach

    </div>


@stop

