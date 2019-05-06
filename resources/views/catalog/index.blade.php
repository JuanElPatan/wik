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

        @foreach( $arrayPeliculas as $key => $pelicula )
        <div style="text-decoration: none !important;" class="col-xs-6 col-sm-4 col-md-3 text-center">

            <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">
                <img src="{{$pelicula->poster}}" style="height:200px"/>
                <h4 class="text-secondary" style="min-height:45px;margin:5px 0 10px 0">
                    {{$pelicula->title}}
                </h4>
            </a>

        </div>
        @endforeach

    </div>

@stop

