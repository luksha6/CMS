@extends('layouts.master')

@section('content')

    @foreach($posts as $post)
        <div class="row">
            @if($post->post_thumbnail)
                <div class="col-sm-5">
                    <img src="{{url('/uploads')}}/{{$post->post_thumbnail}}" alt="Istaknuta Slika"
                         style="border:solid white 1px; height: 150px; width:190px;">
                </div>
            @else
                <div class="col-sm-5">
                    <img src="{{url('/uploads/no_thumbnail_pic/null.png')}}" alt="Istaknuta Slika"
                         style="border:solid white 1px; height: 150px; width:190px;">
                </div>
            @endif
            <div class="col-sm-7" >
                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <a href="{{url('/show/')}}/{{$post->id}}" class="blog-post-title">{{ $post->title }}</a>
                    </h2>
                    <p class="blog-post-meta">
                        {{ $post->created_at->toFormattedDateString() }}, autor <a href="#">{{ $post->user->name }}</a>
                        @if($post->categories()->count()>0)
                            , kategorije:
                            @foreach($post->categories->pluck('name') as $category)
                                <a href="{{url('/category/')}}{{ $category  }}">{{ $category  }}</a>
                            @endforeach
                        @endif
                    </p>
                    <div class="kldfjlf">
                        {!!  str_limit($post->body, 250) !!}
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach

    <div class="text-center">
        {{ $posts->links() }}
    </div>
@endsection