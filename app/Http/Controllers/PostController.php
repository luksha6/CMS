<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Tag;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    protected $guarded = ['id'];

    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(5);

        if ($request = request(['month', 'year'])) {

            $month =  \request('month');
            $month = Carbon::parse($month)->month;
            $year =  \request('year');

            $posts = Post::whereMonth('created_at', $month)->whereYear('created_at', $year)->paginate(5);

            return view('posts.index', compact('posts'));
        }

        return view('posts.index', compact('posts'));
    }

    public function show($id){

        $post = Post::findOrFail($id);

        return view('posts.singlePost', compact('post'));
    }

    public function create(){

        return view('posts.create', compact('post'));
    }

    public function store(Request $request){

        $post = new Post;

        $this->validate(request(),[

            'title' => 'required',
            'body' => 'required'
        ]);

        $requestCategory = request('categories');
        $requestTag = request('selectedtags');
        $requestImage = request('post_thumbnail');
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();


        if( $request->hasFile('post_thumbnail') ) {

            $post_thumbnail     = $request->file('post_thumbnail');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();

            Image::make($post_thumbnail)->resize(600, 600)->save( public_path('/uploads/' . $filename ) );

            $post->post_thumbnail = $filename;
        }

        $post->save();
        $post->categories()->attach($requestCategory);
        $post->tags()->attach($requestTag);

        Session::flash('flash_message', 'Post uspješno objavljen!');

        return back();

    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::get()->all();
        return view('admin.editPost', compact('post', 'tags'));
    }


    public function update($id, Request $request)
    {
        $requestCategory = request('categories');
        $requestTag = request('selectedtags');

        $post = Post::findOrFail($id);

        if( $request->hasFile('post_thumbnail') ) {

            $post_thumbnail     = $request->file('post_thumbnail');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();

            Image::make($post_thumbnail)->resize(600, 600)->save( public_path('/uploads/' . $filename ) );

            $post->post_thumbnail = $filename;
        }

        $post->update($request->all());

        $post->categories()->detach();
        $post->tags()->detach();

        $post->categories()->attach($requestCategory);
        $post->tags()->attach($requestTag);
        Session::flash('flash_message', 'Post uspješno uređen!');
        return back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('message', 'Objava uklonjena!');
        return back();

    }
}
