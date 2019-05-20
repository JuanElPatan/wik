@extends('layouts.master')
@section('content')
<h2>Resumen Detallado</h2>

<hr/>

<div class="row">
    <div class="col-md-4">
        <a href="#">
            <img src="{{$pokeJSON->imageUrl}}"/>
        </a>
    </div>
    <div class="col-md-8">

        {{-- TODO: Datos de la película --}}
        <h1>{{$pokeJSON->name}}</h1>
        @if (isset($pokeJSON->evolvesFrom))
            <h6>Evolves From: {{$pokeJSON->evolvesFrom}}</h6>
        @endif
        @if (isset($pokeJSON->artist))
            <h6>Artist: {{$pokeJSON->artist}}</h6>
        @endif
        @if (isset($pokeJSON->series))
            <h6>Series: {{$pokeJSON->series}}</h6>
        @endif
        @if (isset($pokeJSON->set))
            <h6>Set: {{$pokeJSON->set}}</h6>
        @endif

        <div class="row text-center">
            <div class="col-md-12">
                <a class="btn btn-outline-dark text-dark" href="{{url('/pokemon')}}"><i class="fas fa-angle-left"></i> Volver al listado</a>
            </div>
        </div>
    </div>
</div>
@stop
