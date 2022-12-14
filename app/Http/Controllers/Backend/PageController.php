<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.page.index');
        $pages = Page::latest('id')->get();
        return view('layouts.backend.page.index',[
            'pages'=>$pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.page.create');
        return  view('layouts.backend.page.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.page.create');
        $this->validate($request,[
            'title'=>'required|string|unique:pages',
            'body'=>'required|string',
            'image'=>'required|image'
        ]);
//        Store Data
        $page = Page::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'status'=>$request->filled('status'),
        ]);
//        Image Upload

        if ($request->hasFile('image')){
            $page->addMedia($request->image)->toMediaCollection('image');
        }
        notify()->success('Page Added Successfully','Success');
        return redirect()->route('app.Page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('app.page.edit');
        $pages = Page::find($id);
        return  view('layouts.backend.page.form',[
            'pages'=>$pages,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('app.page.edit');

        $page = Page::find($id);

//        $this->validate($request,[
//            'title'=>'required|string',
//            'excerpt'=>'required|string',
//            'body'=>'required|string',
//            'image'=>'required|image'
//        ]);

//        Update Data

        $page->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'excerpt'=>$request->excerpt,
            'body'=>$request->body,
            'meta_description'=>$request->meta_description,
            'meta_keywords'=>$request->meta_keywords,
            'status'=>$request->filled('status'),
        ]);
//        Image Upload

        if ($request->hasFile('image')){
            $page->addMedia($request->image)->toMediaCollection('image');
        }
        notify()->success('Page Updated Successfully','Success');
        return redirect()->route('app.Page.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo 'this is a message';
    }
}
