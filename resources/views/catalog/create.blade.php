@extends('layouts.master')
@section('content')
<h2 style="color: black;">Create Movie</h2>

<hr/>

<form class="form-horizontal" method="POST">
    @csrf
    <fieldset>

    <!-- Form Name -->
    <legend>Crear película</legend>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="nombre">Nombre</label>
        <div class="col-md-12">
        <input id="nombre" name="nombre" type="text" placeholder="Nombre película" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="anio">Año</label>
        <div class="col-md-12">
        <input id="anio" name="anio" type="text" placeholder="Año de la película" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-12 control-label" for="director">Director</label>
        <div class="col-md-12">
        <input id="director" name="director" type="text" placeholder="Director de la película" class="form-control input-md" required="">

        </div>
    </div>

    <!-- File Button -->
    <div class="form-group">
        <label class="col-md-12 control-label" for="poster">Portada</label>
        <div class="col-md-12">
        <input id="poster" name="poster" type="text" placeholder="URL de la portada" class="form-control input-md" required="">

        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-12 control-label" for="resumen">Resumen</label>
        <div class="col-md-12">
        <textarea class="form-control" id="resumen" name="resumen">Esta película...</textarea>

        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <div class="col-md-12">
        <button id="crear" name="crear" class="btn btn-primary">Crear</button>

        </div>
    </div>

    </fieldset>
 </form>

@stop
