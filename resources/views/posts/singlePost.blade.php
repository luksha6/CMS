@extends('layouts.master')

@section('content')

    <h1>{{ $post->title }}</h1>

    <div class="categories">

        @if($post->categories()->count()>0)
            <p>Kategorije:
                @foreach($post->categories as $category)
                    <strong>
                        <a href="{{url('/category')}}/{{ $category->name }}">{{ $category->name }}</a>
                    </strong>
                @endforeach
            </p>
        @endif
    </div>

    <hr>

    {!! $post->body !!}

    <hr>

    <div class="tags">

        @if($post->tags()->count()>0)
            <p>Oznake:
                @foreach($post->tags as $tag)
                    <strong>
                    #<a href="{{url('/tags')}}/{{ $tag->name }}">{{ $tag->name }}</a>
                    </strong>
                @endforeach
            </p>
        @endif
    </div>

    <div class="comments">
        <ul class="list-group">

            @if($post->comments()->count()>0)

                @foreach($post->comments as $comment)

                    <li class="list-group-item" >
                        <div class="row">
                        <div class="col-sm-2" style="text-align:center;">
                            <img src="{{url('/uploads/no_thumbnail_pic/NULL.png')}}" alt="Istaknuta Slika"
                                 style="border:solid white 1px; height: 100px; width:100px;">
                        </div>
                            <div class="col-sm-10">
                                <p><strong>Komentar: </strong>{{ $comment->body }}</p>

                                <hr>
                                @if(Auth::user())
                                     @if(($comment->user_id == Auth::user()->id) || (Auth::user()->role=='admin') || (Auth::user()->role=='moderator'))
                                         <a href="{{url('comment/delete')}}/{{$comment->id}}" style="position:absolute;top:-5px;right:2px"><i style="color:red;" class="fa fa-times"></i></a>
                                    @endif
                                @endif
                        <p style="position:absolute;right:3px;bottom:-20px">  <strong>Objavio {{ $comment->user->name }} - </strong> {{ $comment->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach

            @else
                <li class="list-group-item">

                    <strong>
                        Još nema komentara. Budite prvi!
                    </strong>

                </li>
            @endif
        </ul>
    </div>
    @if (Auth::check())
        <hr>

        <div class="card">
            <div class="card-block" style="padding:15px;">
                <form method="POST" action="{{ $post->id }}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" placeholder="Unesite komentar:" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Objava</button>
                    </div>

                </form>
                @include('layouts.errors')
            </div>
        </div>
    @endif
@endsection