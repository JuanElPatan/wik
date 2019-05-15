@extends('layouts.master')
@section('content')
<h2>Resumen Detallado</h2>

<hr/>

<div class="row">
    <div class="col-sm-4" style="display: flex; justify-content: center; align-items:center;">


            <div class="col-xs-6 col-sm-4 col-md-3 text-center">

                <a href="#">
                    <img src="{{$pelicula->poster}}" style="height:200px"/>
                </a>

            </div>

    </div>
    <div class="col-sm-8">

        {{-- TODO: Datos de la película --}}
        <h1>{{$pelicula->title}}</h1>
        <h5>Año: {{$pelicula->year}}</h5>
        <h5>Director: {{$pelicula->director}}</h5>

        <p><b>Resumen: </b>{{$pelicula->synopsis}}</p>
        @if($pelicula->rented == true)
        <p><b>Estado: </b>Película actulamten alquilada</p>
        @elseif($pelicula->rented == false)
        <p><b>Estado: </b>Película actualmente disponible para alquilar</p>
        @endif


        <div class="row text-center">
            <div class="col-md-4">
                @if($pelicula->rented == true)
                    <a submit class="btn btn-danger text-white" data-toggle="button" value="{{$pelicula->rented = true}}">Devolver película</a>
                @elseif($pelicula->rented == false)
                    <a submit class="btn btn-success text-white" data-toggle="button" value="{{$pelicula->rented = true}}">Alquilar película</a>
                @endif
            </div>
            <div class="col-md-4">
                <a class="btn btn-warning text-white" href="{{url('/anime/edit/' . $pelicula->id)}}"><i class="fas fa-pencil-alt"></i> Editar película</a>
            </div>
            <div class="col-md-4">
                <a class="btn btn-outline-dark text-dark" href="{{url('/anime')}}"><i class="fas fa-angle-left"></i> Volver al listado</a>
            </div>
        </div>
    </div>
</div>
@stop
