<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all(); 
        $deletedCategories = Category::onlyTrashed()->get();
        //dd($deletedCategories->count());
        return view('categories.index')->withCate($categories)->withDeletedCategories ($deletedCategories);
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
    public function store(Request $request)
    {


        $this->validate($request, array(
            'name' => 'required|max:255',
        ));

        $category =  new Category();
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Category is added successfully');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('categories.edit')->withCategory($category);
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
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        Session::flash('success', 'Category is updated successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
       //dd($category);
        Session::flash('success','Category has been deleted');
        return redirect()->route('category.index');
    }
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
    
       //dd($category);
        Session::flash('success','Category has restore');
        return redirect()->route('category.index');
    }
}
