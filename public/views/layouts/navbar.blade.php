<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

    <a class="navbar-brand" href="/public">
        <div class="logo-container ">
            <div class="logo">
                <img src="/resources/assets/img/fsrcmslogo.png" alt="FSRcms LOGO" rel="tooltip">
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/public">Početna <span class="sr-only">(current)</span></a>
            </li>
            @foreach($menuCategories as $menuCategory)
                <li class="nav-item">
                    <a class="nav-link" href="/public/category/{{ $menuCategory->name }}">{{ $menuCategory->name }}</a>
                </li>
            @endforeach
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Kategorija</a>
                    <a class="dropdown-item" href="#">Kategorija</a>
                    <a class="dropdown-item" href="#">Kategorija</a>
                </div>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0 pomakni">
            @if (Auth::check())

                <div class="btn-group">
                    <button type="button" class="btn btn-luksha dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <a id="nightmodeID"><img class="nightmodeCLS" src="/resources/assets/img/brightness.png"></a>
                    <div class="dropdown-menu" style="right: 0; left: auto;">
                        <a class="dropdown-item" href="/public/admin">Administracija</a>
                        <a class="dropdown-item" href="/public/profile/edit">Moj profil</a>
                        <a class="dropdown-item" href="/public/logout">Odjava</a>

                    </div>
                </div>



            @else
                <a href="/public/login" class="btn btn-light" type="submit" style="margin-right:8px;">Login</a>
                <a href="/public/register" class="btn btn-luksha" type="submit">Register</a>
                <a id="nightmodeID" style="cursor:pointer;"><img class="nightmodeCLS"
                                                                 src="/resources/assets/img/brightness.png"></a>
            @endif

        </form>
    </div>
</nav>