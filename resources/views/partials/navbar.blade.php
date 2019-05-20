<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><i class="fab fa-wikipedia-w"></i> Wik</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        @if (substr(Route::getFacadeRoot()->current()->uri(), 0, 7) == 'pokemon')
                            <a class="nav-link" href="{{url('/pokemon')}}">
                                <i class="fas fa-gamepad"></i> Pokémon Catalogue
                            </a>
                        @elseif (substr(Route::getFacadeRoot()->current()->uri(), 0, 5) == 'anime')
                            <a class="nav-link" href="{{url('/anime')}}">
                                <i class="fas fa-archive"></i> Anime Catalogue
                            </a>
                        @endif
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <div style="display:inline">
                            @if (substr(Route::getFacadeRoot()->current()->uri(), 0, 7) == 'pokemon')
                                <form action="{{ route('animeIn') }}" method="GET" style="display:inline">
                                    <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                        Anime
                                    </button>
                                </form>
                            @elseif (substr(Route::getFacadeRoot()->current()->uri(), 0, 5) == 'anime')
                                <form action="{{ route('pokemonIn') }}" method="GET" style="display:inline">
                                    <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                        Pokémon
                                    </button>
                                </form>
                            @endif
                        <div>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
