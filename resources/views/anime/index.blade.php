    @extends('layouts.master')
@section('content')

<h2 style="color: black;">Anime</h2>

<hr/>

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <div class="container">

        <form role="form" method="GET" action="{{ action('AnimeController@getIndex') }}" class="row">
            <div class="col-md-11">
                <input type="text" class="form-control" name="anime" placeholder="Anime"/>
            </div>
            <div class="col-md-1">
                <input type="submit" name="consult" value="Search" class="send btn"/>
            </div>
        </form>
        <br>
        <div class="row">

            <div class="card-columns">
                    @foreach( $animeJSON as $key => $anime )

                <div class="card" style="width: 18rem;">
                    @if ($anime->attributes->posterImage->medium)
                        <img src="{{$anime->attributes->posterImage->medium}}" id="img-{{$anime->id}}" width="100%" alt="{{$anime->attributes->titles->en_jp}}"/>
                    @else
                        <img src="{{asset("img/err.jpg")}}" id="img-err" alt="{{$anime->attributes->titles->en_jp}}"/>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$anime->attributes->titles->en_jp}}</h5>
                        <p class="card-text">{{str_limit($anime->attributes->synopsis, 150)}}</p>

                        <a href="{{ url('/anime/show/' . $anime->id ) }}">more information</a>
                    </div>
                </div>

            @endforeach
        </div>

        </div>

    </div>

@stop

