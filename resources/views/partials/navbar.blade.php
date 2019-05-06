<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><i class="fas fa-video"></i> Videoclub</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog')}}">
                            <i class="fa fa-film"></i> Catálogo
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/create')}}">
                            <i class="fas fa-plus"></i> Nueva película
                        </a>
                    </li>
                    {{--  <li class="nav-item {{  Request::is('catalog/edit/1') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/edit/1')}}">
                            <i class="fas fa-pencil-alt"></i> Edit película 1
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('catalog/show/1') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/show/1')}}">
                            <i class="far fa-eye"></i> Show Movie 1
                        </a>
                    </li>  --}}
                </ul>

                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
