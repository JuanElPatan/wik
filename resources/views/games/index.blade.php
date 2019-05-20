    @extends('layouts.master')
@section('content')
<h2 style="color: black;">Games</h2>

<hr/>

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <div class="container">
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
                            <h5 class="card-title">{{ $pokemon->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Rarity: {{ $pokemon->rarity }}</li>
                            <li class="list-group-item">Series: {{ $pokemon->series }}</li>
                            <li class="list-group-item">Set: {{ $pokemon->set }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ url('/games/show/' . $pokemon->id ) }}" class="card-link">See More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop

