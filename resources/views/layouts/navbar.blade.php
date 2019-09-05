<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

    <a class="navbar-brand" href="{{url('/')}}">
        <div class="logo-container ">
            <div class="logo">
                <img src="{{url('/resources/assets/img/fsrcmslogo.png')}}" alt="FSRcms LOGO" rel="tooltip">
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }} }}">
                <a class="nav-link" href="{{url('/')}}">Početna <span class="sr-only">(current)</span></a>
            </li>
            @foreach($menuCategories as $menuCategory)
                <li class="nav-item {{Request::segment(2) === $menuCategory->name ? 'active' : '' }}">
                    <a class="nav-link" href="{{url('/category')}}/{{ $menuCategory->name }}">{{ $menuCategory->name }}</a>
                </li>
            @endforeach

        </ul>
        <form class="form-inline my-2 my-lg-0 pomakni">
            @if (Auth::check())

                <div class="btn-group">
                    <button type="button" class="btn btn-luksha dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" style="right: 0; left: auto;">
                        @can('moderator-access')
                        <a class="dropdown-item" href="{{url('/admin')}}">Administracija</a>
                        @endcan
                        <a class="dropdown-item" href="{{url('/profile/edit')}}">Moj profil</a>
                        <a class="dropdown-item" href="{{url('/logout')}}">Odjava</a>

                    </div>
                </div>



            @else
                <a href="{{url('/login')}}" class="btn btn-light" type="submit" style="margin-right:8px;">Prijava</a>
                <a href="{{url('/register')}}" class="btn btn-luksha" type="submit">Registriracija</a>
            @endif

        </form>
    </div>
</nav>