<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $slide = new Slider;

        $this->validate(request(),[

            'title' => 'required',
            'body' => 'required'
        ]);

        $data = $request->all();

        //$slide->title = request('title');
        $slide->fill($data);

        $active = request('active');
        if($active == 'on'){
            $slide->active = 1;
        }
        else{
            $slide->active = 0;
        }

        $buttonActive = request('button_active');
        if($buttonActive == 'on'){
            $slide->button_active = 1;
        }
        else{
            $slide->button_active = 0;
        }

        $slide->save();
        Session::flash('flash_message', 'Slajd uspješno kreiran!');

        return back();

    }

    public function edit($id)
    {

        $slide = Slider::findOrFail($id);
        return view('admin.editSlide', compact('slide'));
    }

    public function update($id, Request $request)
    {

        $slide = Slider::findOrFail($id);

        $this->validate(request(),[

            'title' => 'required',
            'body' => 'required'
        ]);

        $slide->fill($request->all());

        $active = request('active');

        if($active == 'on'){
            $slide->active = 1;
        }
        else{
            $slide->active = 0;
        }

        $buttonActive = request('button_active');
        if($buttonActive == 'on'){
            $slide->button_active = 1;
        }
        else{
            $slide->button_active = 0;
        }

        $slide->save();

        Session::flash('flash_message', 'Slajd uspješno uređen!');
        return back();
    }

    public function destroy($id)
    {
        $slide = Slider::findOrFail($id);
        $slide->delete();
        Session::flash('flash_message', 'Slajd uklonjen!');
        return back();

    }
}
