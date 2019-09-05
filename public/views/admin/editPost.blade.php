@extends('admin.layout.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="content-header">
            <h1>
                Uređivač Objava

            </h1>
            <ol class="breadcrumb">
                <li><a href="/public/admin"><i class="fa fa-dashboard"></i> Pocetak</a></li>
                <li>Objave</li>
                <li class="active">Uredi objavu</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <form method="POST" action="/public/post/update/{{ $post->id }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="col-md-10">
                        <div class="box box-primary">
                            <div class="box-header">
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <div class="input-group margin">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-warning">Naslov</button>
                                        </div>
                                        <input type="text" id="title" name="title" class="form-control"
                                               value="{{ $post->title }}">
                                    </div>

                                    <div class="form-group">
                                        Kategorije:
                                        @foreach ($categories as $category)
                                            <label>
                                                <input type="checkbox" value="{{ $category->id }}" name="categories[]"
                                                       class="flat-red">
                                                <span class="label label-warning"
                                                      style="padding-top: 5px"> {{ $category->name }}</span>
                                            </label>
                                        @endforeach

                                    </div>


                                    <textarea id="editor1" name="body" rows="10" cols="80">
                                            {{ $post->body }}
                                    </textarea>
                                    <div class="form-group">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-success"> OBJAVI</button>
                                            <button class="btn btn-warning"> SPREMI KAO SKICU</button>
                                            <button class="btn btn-danger"> OBRIŠI</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col-->
                    </div>
                    <div class="col-md-2">
                        <div class="box box-primary">
                            <div class="box-header"><h3> TAGOVI </h3><span class="small">Odaberite odgovarajuće tagove za vašu objavu.</span>
                            </div>
                            <div class="box-body">
                                <div class="form-group">


                                    @foreach ($tags as $tag)
                                        <label>
                                            <input type="checkbox" value="{{ $tag->id }}" name="selectedtags[]"
                                                   class="flat-red">
                                            <span class="label label-warning"
                                                  style="padding-top: 5px"> {{ $tag->name }}</span>
                                        </label>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header"><h3> ISTAKNUTA SLIKA </h3><span class="small">Slika koja će biti izdvojena u objavi.</span>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="post_thumbnail">Odaberite istaknutu sliku:</label> <br/>
                                    <input type="file" name="post_thumbnail" id="post_thumbnail"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- ./row -->
            </div>
        </section>

        <!-- Main content -->

    </div>
@endsection