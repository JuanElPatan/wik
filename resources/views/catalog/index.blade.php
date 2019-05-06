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
            <div class="card">
                <img src="{{$pelicula->poster}}" id="img-{{$pelicula->id}}" style="height:200px"/>
                    <div class="card-body">
                    <h5 class="card-title">{{$pelicula->title}}</h5>
                    <p class="card-text">{{$pelicula->synopsis}}</p>
                    <a href="{{ url('/catalog/show/' . $pelicula->id ) }}">Link</a>
                </div>
            </div>


                <div class="card">

                </div>

        @endforeach
    </div>

@stop

