    @extends('layouts.master')
@section('content')

@php

    $client = new GuzzleHttp\Client();
    $res = $client->get('https://kitsu.io/api/edge/anime');
    //echo $res->getStatusCode();

    $animes = $res->getBody();

    echo $animes->data[0].attributes.posterImage.original;

@endphp

<h2 style="color: black;">Catalogo</h2>

<hr/>

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <div class="row">

        @foreach( $arrayPeliculas as $key => $anime )
            <div class="card">
                    @if (asset($anime->poster))
                        <img src="{{$anime->poster}}" id="img-{{$anime->id}}" style="height:400px"/>
                    @else
                        <img src="{{asset("img/err.jpg")}}" id="img-err"/>
                    @endif
                    <div class="card-body">
                    <h5 class="card-title">{{$anime->title}}</h5>
                    <p class="card-text">{{$anime->synopsis}}</p>

                    <a href="{{ url('/catalog/show/' . $anime->id ) }}">Link</a>
                </div>
            </div>


                <div class="card">

                </div>

        @endforeach

    </div>


@stop

