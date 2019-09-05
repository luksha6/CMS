<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year','month')->get()->toArray();
        $posts = $category->posts()->paginate(5);
        return view('posts.index',compact('posts', 'archives'));
    }

    public function create()
    {
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year','month')->get()->toArray();
        return view('category.create', compact('archives'));
    }

    public function store(){

        $category = new Category;

        $this->validate(request(),[

            'name' => 'required'
        ]);

        $category->name = request('name');
        $category->save();
        //Post::create($post);

        return back();

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editCategory', compact('category'));
    }


    public function update($id, Request $request)
    {

        $category = Category::findOrFail($id);
        $category->update($request->all());

        Session::flash('flash_message', 'Kategorija uspješno uređena!');
        return back();
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back();

    }
}
