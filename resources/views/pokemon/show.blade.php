@extends('layouts.master')
@section('content')
<h2>Resumen Detallado</h2>

<hr/>

<div class="row">
    <div class="col-md-4">
        <a href="#">
            @if(isset($pokeJSON->imageUrl))
                <img src="{{$pokeJSON->imageUrl}}"/>
            @endif
        </a>
    </div>
    <div class="col-md-8">
        {{-- TODO: Datos de la película --}}
        @if(isset($pokeJSON->hp))
            <h1>{{$pokeJSON->name}} - {{$pokeJSON->hp}}<sup>hp</sup></h1>
        @else
            <h1>{{$pokeJSON->name}}</h1>
        @endif
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
        @if (isset($pokeJSON->rarity))
            <h6>Rarity: {{$pokeJSON->rarity}}</h6>
        @endif

        @if (isset($pokeJSON->ability))
            <h4>Ability<h4>
            <h5>Name: {{ $pokeJSON->ability->name }} - Type: {{ $pokeJSON->ability->type }}</h5>
            <h6>Description: {{ $pokeJSON->ability->text }}</h6>
        @endif

        @if (isset($pokeJSON->attacks))
            <div class="row">
                @foreach ($pokeJSON->attacks as $key => $attack)
                    <div class="col-md-6">
                        <h4>Cost:</h4>
                        <p>
                            @foreach ($attack->cost as $keyC => $cost)
                                {{ $cost }}
                            @endforeach
                        </p>
                        <h6>Name: {{ $attack->name }}</h6>
                        @if (strlen($attack->text) == 0)
                            <h5>No Description Found</h5>
                        @elseif (isset($attack->text))
                            <h5>Description:</h5>
                            <p>{{ $attack->text }}</p>
                        @endif
                        @if (isset($attack->damage))
                            <h6>Damage: {{ $attack->damage }}</h6>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        @if (isset($pokeJSON->resistances))
            <h4>Resistances:</h4>
            @foreach ($pokeJSON->resistances as $key => $resistance)
                <h6>Type: {{ $resistance->type }}</h6>
                <h6>Quantity: {{ $resistance->value }}</h6>
            @endforeach
        @endif

        @if (isset($pokeJSON->weaknesses))
            <h4>Weaknesses:</h4>
            @foreach ($pokeJSON->weaknesses as $key => $weaknesse)
                <h6>Type: {{ $weaknesse->type }}</h6>
                <h6>Quantity: {{ $weaknesse->value }}</h6>
            @endforeach
        @endif

        <div class="row text-center">
            <div class="col-md-6">
                <a class="btn btn-primary" href="{{ route('pokemonAddFav', ['id' => $pokeJSON->id]) }}">Añadir a favoritos</a>
            </div>
            <div class="col-md-6">
                <a class="btn btn-outline-dark text-dark" href="{{ route('pokemonIn') }}"><i class="fas fa-angle-left"></i> Volver al listado</a>
            </div>
        </div>
    </div>
</div>
@stop
