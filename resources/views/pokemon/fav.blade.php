@extends('layouts.master')
@section('content')
<h2 style="color: black;">Personal Favourites - <a style="font-size: 26px;" href="{{ route('pokemonIn') }}">Pokémon Index</a></h2>

<hr/>

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <div class="container">

        <form role="form" method="GET" action="{{ action('PokemonController@getIndex') }}" class="row">
            <div class="col-md-11">
                <input type="text" class="form-control" name="pokemon" placeholder="Pokemon"/>
            </div>
            <div class="col-md-1">
                <input type="submit" name="consult" value="Search" class="send btn"/>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="card-columns">
                @foreach( $favs as $key => $pokemon )
                    @php
                        $dp = json_decode($pokemon['jsonPokemon']);
                    @endphp

                    <div class="card text-center" style="width: 18rem;">
                        @if (asset($dp->cards[0]->imageUrl))
                            <a href="{{ url('/pokemon/show/' . $dp->cards[0]->id ) }}" class="card-link">
                                <img class="card-img-top" src="{{ $dp->cards[0]->imageUrl }}" alt="{{ $dp->cards[0]->name }}">
                            </a>
                        @else
                            <a href="{{ url('/pokemon/show/' . $dp->cards[0]->id ) }}" class="card-link">
                                <img class="card-img-top" src="{{asset("img/err.jpg")}}" id="img-err" alt="{{ $dp->cards[0]->name }}"/>
                            </a>
                        @endif
                        <div class="card-body">
                            @if (isset($dp->cards[0]->name))
                                <h5 class="card-title">{{ $dp->cards[0]->name }}</h5>
                            @endif
                        </div>
                        <ul class="list-group list-group-flush">
                            @if (isset($dp->cards[0]->rarity))
                                <li class="list-group-item">Rarity: {{ $dp->cards[0]->rarity }}</li>
                            @endif
                            @if (isset($dp->cards[0]->series))
                                <li class="list-group-item">Series: {{ $dp->cards[0]->series }}</li>
                            @endif
                            @if (isset($dp->cards[0]->set))
                                <li class="list-group-item">Set: {{ $dp->cards[0]->set }}</li>
                            @endif
                        </ul>
                        <div class="card-body">
                            <a href="{{ url('/pokemon/show/' . $dp->cards[0]->id ) }}" class="card-link">See More</a>
                        </div>
                    </div>


                @endforeach
            </div>
        </div>
    </div>


@stop

