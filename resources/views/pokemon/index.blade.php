    @extends('layouts.master')
@section('content')
<h2 style="color: black;">Pokémon Catalogue</h2>

<hr/>

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <div class="container">

        <form role="form" method="GET" action="{{ action('PokemonController@getIndex') }}" class="row">
            <div class="col-md-11">
                <input type="text" class="form-control" name="pokemon" placeholder="Nombre del Pokemon"/>
            </div>
            <div class="col-md-1">
                <input type="submit" name="consult" value="Buscar" class="send btn"/>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="card-columns">
                @foreach( $pokeJSON as $key => $pokemon )

                    <div class="card text-center" style="width: 18rem;">
                        @if (asset($pokemon->imageUrl))
                            <img class="card-img-top" src="{{ $pokemon->imageUrl }}" alt="{{ $pokemon->name }}">
                        @else
                            <img class="card-img-top" src="{{asset("img/err.jpg")}}" id="img-err" alt="{{ $pokemon->name }}"/>
                        @endif
                        <div class="card-body">
                            @if (isset($pokemon->name))
                                <h5 class="card-title">{{ $pokemon->name }}</h5>
                            @endif
                        </div>
                        <ul class="list-group list-group-flush">
                            @if (isset($pokemon->rarity))
                                <li class="list-group-item">Rarity: {{ $pokemon->rarity }}</li>
                            @endif
                            @if (isset($pokemon->series))
                                <li class="list-group-item">Series: {{ $pokemon->series }}</li>
                            @endif
                            @if (isset($pokemon->set))
                                <li class="list-group-item">Set: {{ $pokemon->set }}</li>
                            @endif
                        </ul>
                        <div class="card-body">
                            <a href="{{ url('/pokemon/show/' . $pokemon->id ) }}" class="card-link">See More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop

