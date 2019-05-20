    @extends('layouts.master')
@section('content')

<h2 style="color: black;">Catalogo</h2>

<hr/>

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif

    <div class="row">

        @foreach( $animeJSON as $key => $anime )

            <div class="card">
                @if ($anime->attributes->posterImage->large)
                    <img src="{{$anime->attributes->posterImage->large}}" id="img-{{$anime->id}}" style="height:1000px" alt="{{$anime->attributes->titles->en_jp}}"/>
                @else
                    <img src="{{asset("img/err.jpg")}}" id="img-err" alt="{{$anime->attributes->titles->en_jp}}"/>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$anime->attributes->titles->en_jp}}</h5>
                    <p class="card-text">{{$anime->attributes->synopsis}}</p>

                    <a href="{{ url('/anime/show/' . $anime->id ) }}">Link</a>
                </div>
            </div>


            <div class="card">

            </div>

        @endforeach

    </div>


@stop

