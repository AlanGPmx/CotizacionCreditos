<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();

        return view('application.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categories;
        $category->name = $request->name;
        $category->active = ($request->active == 'on') ? true : false;
        $category->save();

        return redirect()->back()->with('message', 'La categoria se ha añadido con éxito.')->with('type', 'alert-success')->with('icon', 'fa-check-circle');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        return view('application.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Categories::find($id);

        $msg = 'La categoría "' . $category->name . '" ahora es "' . $request->name . '"';

        $category->name = $request->name;
        $category->active = ($request->active == 'on') ? true : false;
        $category->save();

        return redirect()->route('categories')->with('message', $msg)->with('type', 'alert-success')->with('icon', 'fa-check-circle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $itemCarousel = Categories::find($id);
        $wasDeleted = $itemCarousel->delete();

        return ($wasDeleted) ? 1 : 0;
    }

    /**
     * Update status 'Active' from resource
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $user = Categories::find($request->id);
        $user->active = $request->newStatus;
        $wasSaved = $user->save();
        return ($wasSaved) ? 1 : 0;
    }
}
