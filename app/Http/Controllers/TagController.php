<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate(5);
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(){

        $tag = new Tag;

        $this->validate(request(),[

            'name' => 'required'
        ]);

        $tag->name = request('name');
        $tag->save();
        //Post::create($post);

        return back();

    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.editTag', compact('tag'));
    }


    public function update($id, Request $request)
    {

        $tag = Tag::findOrFail($id);

        $this->validate(request(),[

            'name' => 'required'
        ]);

        $tag->update($request->all());


        Session::flash('flash_message', 'Tag uspješno uređen!');
        return back();
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return back();

    }

}
