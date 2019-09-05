<header>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach( $slider as $slide )
                <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <div class="carousel-inner" role="listbox">
            @foreach( $slider as $slide )
                <div class="carousel-item {{ $loop->first ? ' active' : '' }}" >
                    <img src="{{ $slide->image }}" alt="{{ $slide->title }}">
                    <div class="container">
                        <div class="carousel-caption text-center">
                            <h1>{{$slide->title}}</h1>
                            <p>{{$slide->body}}</p>
                            <p><a class="btn btn-lg btn-luksha" href="{{ $slide->button_link }}" role="button">{{ $slide->button_title }}</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Naprijed</span>
        </a>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Nazad</span>
        </a>
    </div>

    <div class="container">

        <div class="starter-template">
            <h1>FSR CMS</h1>
            <p class="lead">RWA 2017/2018</p>
        </div>

    </div><!-- /.container -->
</header>