<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $categories = Categories::all();
        return view('application.products.index')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Products;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->sku = $request->sku;
        $product->active = ($request->active == 'on') ? true : false;
        $product->description = $request->description;

        if ($request->hasDiscount == 'on') {
            $product->typeDiscount = $request->typeDiscount;
            $product->discount = (float) $request->discount / 100;
        }

        if ($request->has('image')) {
            $filename = 'imageProduct' . $request->sku . '.' . $request->image->getClientOriginalExtension();
            $path = public_path() . '/images/products/';

            if (file_exists($path . $filename)) {
                File::delete($path . $filename);
            }

            $request->image->storeAs('/images/products/', $filename, 'public_folder');
            $product->image = $filename;
        }

        $product->save();

        return redirect()->back()->with('message', 'El producto se ha añadido con éxito.')->with('type', 'alert-success')->with('icon', 'fa-check-circle');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        return view('application.products.edit')->with('product', $product)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->active = ($request->active == 'on') ? true : false;
        $product->description = $request->description;

        if ($request->hasDiscount == 'on') {
            $product->typeDiscount = $request->typeDiscount;
            $product->discount = (float) $request->discount / 100;
        } else {
            $product->typeDiscount = null;
            $product->discount = null;
        }

        if ($request->has('image')) {
            $filename = 'imageProduct' . $request->sku . '.' . $request->image->getClientOriginalExtension();
            $path = public_path() . '/images/products/';
            File::delete($path . $product->image);

            if (file_exists($path . $filename)) {
                File::delete($path . $filename);
            }

            $request->image->storeAs('/images/products/', $filename, 'public_folder');
            $product->image = $filename;
        }

        $product->sku = $request->sku;
        $product->save();

        return redirect()->back()->with('message', 'El producto se ha editado con éxito.')->with('type', 'alert-success')->with('icon', 'fa-check-circle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $product = Products::find($id);
        $wasDeleted = $product->delete();

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
        $user = Products::find($request->id);
        $user->active = $request->newStatus;
        $wasSaved = $user->save();
        return ($wasSaved) ? 1 : 0;
    }
}
