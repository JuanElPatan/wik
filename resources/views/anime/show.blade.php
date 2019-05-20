@extends('layouts.master')
@section('content')
<h2>Resumen Detallado</h2>

<hr/>

<div class="row">
    <div class="col-sm-4" style="display: flex; justify-content: center; align-items:center;">
        <a href="#">
            <img src="{{$pokeJSON->}}" style="height:400px"/>
        </a>
    </div>
    <div class="col-sm-8">

        {{-- TODO: Datos de la película --}}
        <h1>{{$animeAct->attributes->titles->en_jp}}</h1>
        <h5>Publication Date: {{$animeAct->attributes->startDate}}</h5>
        @if ($animeAct->attributes->endDate != null)
            <h5>Finalitzation Date: {{$animeAct->attributes->endDate}}</h5>
        @endif

        <p><b>Resumee: </b>{{$animeAct->attributes->synopsis}}</p>

        <div class="row text-center">
            <div class="col-md-12">
                <a class="btn btn-outline-dark text-dark" href="{{url('/anime')}}"><i class="fas fa-angle-left"></i> Volver al listado</a>
            </div>
        </div>
    </div>
</div>
@stop
