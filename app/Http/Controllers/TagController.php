<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        //$deletedtag = Tag::onlyTrashed()->get()->withdeletedtag($deletedtag);
        return view('tags.index')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        $tag = new Tag();

        $tag->name = $request->name;
        $tag->save();

        Session::flash('success','Tag has saved successfully');
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->withTag($tag);
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
        $this->validate($request, array(
            'name' => 'required|max:255',
        ));
        $tag = Tag::find($id);
        $tag->name = $request->input('name');
        $tag->save();
        Session::flash('success', 'Tag is updated successfully');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        Session::flash('success', 'Tag is deleted successfully');
        return redirect()->route('tag.index');

    }

    // public function restore($id){

    //     $tag = Tag::withTrashed()->find($id)->restore();

    //     Session::flash('success','Tag has been restored');
    //     return redirect()->route('tag.index');
    // }
}
