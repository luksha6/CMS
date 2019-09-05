@extends('layouts.master')

@section('content')

    <h1>{{ $post->title }}</h1>

    <div class="categories">

        @if($post->categories()->count()>0)
            <p>Kategorije:
                @foreach($post->categories as $category)
                    <strong>
                        <a href="/public/category/{{ $category->name }}">{{ $category->name }}</a>
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
                    #<a href="/public/tags/{{ $tag->name }}">{{ $tag->name }}</a>
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
                            <img src="/public/uploads/no_thumbnail_pic/NULL.png" alt="Istaknuta Slika"
                                 style="border:solid white 1px; height: 100px; width:100px;">
                            <p><strong style="position:absolute;left:15px;bottom:-5px">Luka Bjelica</strong></p>
                        </div>
                            <div class="col-sm-10">
                                <p><strong>Komentar: </strong>{{ $comment->body }}</p>
                        <p style="position:absolute;right:3px;bottom:-20px">  <strong>Objavljeno: </strong> {{ $comment->created_at->diffForHumans()}}</p>
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