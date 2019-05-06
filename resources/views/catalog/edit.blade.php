@extends('layouts.master')
@section('content')
<h1>Editar Película</h1>

<hr/>
    <form class="form-horizontal" method="POST">
        @csrf
        <fieldset>

        <!-- Form Name -->
        <legend>Editar Película</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="nombre">Nombre</label>
            <div class="col-md-12">
            <input id="nombre" name="nombre" type="text" placeholder="Nombre película" value="{{$pelicula->title}}" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="anio">Año</label>
            <div class="col-md-12">
            <input id="anio" name="anio" type="text" placeholder="Año de la película" value="{{$pelicula->year}}" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-12 control-label" for="director">Director</label>
            <div class="col-md-12">
            <input id="director" name="director" type="text" placeholder="Director de la película" value="{{$pelicula->director}}" class="form-control input-md" required="">

            </div>
        </div>

        <!-- File Button -->
        <div class="form-group">
            <label class="col-md-12 control-label" for="poster">Portada</label>
            <div class="col-md-12">
            <input id="poster" name="poster" type="text" placeholder="URL de la portada" value="{{$pelicula->poster}}" class="form-control input-md" required="">

        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-12 control-label" for="resumen">Resumen</label>
            <div class="col-md-12">
            <textarea class="form-control" id="resumen" name="resumen">{{$pelicula->synopsis}}</textarea>

            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <div class="row text-center">
                <div class="col-md-6">
                <button id="editar" name="editar" class="btn btn-warning text-white">Editar</button>

                </div>
                <div class="col-md-6">
                <a id="return" name="return" class="btn btn-outline-dark text-black" href="{{url('/catalog/show/' . $pelicula->id)}}"><i class="fas fa-angle-left"></i> Volver a la película</a>

                </div>
            </div>
        </div>

        </fieldset>
    </form>
@stop
